<?php

/**
 * Wise Chat image services class.
 *
 * @author Marcin Ławrowski <marcin@kaine.pl>
 */
class WiseChatImagesService {
	const UPLOAD_FILE_NAME = '_wise_chat_upload';
	
	/**
	* @var string
	*/
	private $tempFileName;
	
	/**
	* @var WiseChatOptions
	*/
	private $options;
	
	private $supportedExtensions = array(
		'image/gif' => 'gif',
		'image/jpeg' => 'jpg',
		'image/png' => 'png'
	);
	
	public function __construct() {
		$this->options = WiseChatOptions::getInstance();
	}
	
	/**
	* Prepares an image for the final upload.
	*
	* @param string $binaryImageData Binary image data
	*
	* @return string Prepared binary image data
	* @throws \Exception
	*/
	public function getPreparedImage($binaryImageData) {
		$this->checkImagesRequirements();
		
		if (strlen($binaryImageData) > $this->options->getIntegerOption('images_size_limit', 3145728)) {
			throw new Exception($this->options->getEncodedOption('message_error_8'));
		}
		
		try {
			$this->createTempFile();
			$this->saveTempFile($binaryImageData);

			/** @var WiseChatImageEditor $imageEditor */
			$imageEditor = WiseChatContainer::get('services/WiseChatImageEditor');
			$imageEditor->load($this->tempFileName);
			$imageEditor->resize(
				$this->options->getIntegerOption('images_width_limit', 1000),
				$this->options->getIntegerOption('images_height_limit', 1000)
			);
			$imageEditor->fixOrientation();
			$imageEditor->build();
			
			$preparedRawData = file_get_contents($this->tempFileName);
			
 			$this->deleteTempFile();
 			
 			return $preparedRawData;
		} catch (Exception $e) {
			$this->deleteTempFile();
			
			throw $e;
		}
	}
	
	/**
	* Parses "data:image/jpeg;base64,"-like prefix from the given string and Base64-decodes the rest.
	*
	* @param string $rawBase64Data Base64-encoded image data with prefix
	*
	* @return array
    * @throws Exception If image data is invalid
	*/
	public function decodePrefixedBase64ImageData($base64Data) {
		$prefixData = array();
		preg_match('/^data:(image\/\w+);base64/', $base64Data, $prefixData);
		
		if (!is_array($prefixData) || count($prefixData) < 2) {
			throw new Exception('Invalid image data');
		}
	
		$data = substr($base64Data, strpos($base64Data, ",") + 1);
		
		return array(
			'data' => base64_decode($data),
			'mimeType' => $prefixData[1]
		);
	}
	
	/**
	* Encodes image data to Base64 and adds the prefix like "data:image/jpeg;base64," at the beginning.
	*
	* @param string $binaryImageData
	* @param string $mimeType
	*
	* @return string
	*/
	public function encodeBase64WithPrefix($binaryImageData, $mimeType) {
		$data = base64_encode($binaryImageData);
		
		return sprintf('data:%s;base64,', $mimeType).$data;
	}
	
	/**
	* Downloads image from the given URL and saves it into the Media Library.
	* Returns image details as an array or throws an exception in case of an error. 
	* Custom thumbnail image is generated as well.
	*
	* @notice Redirections during retrieving the image are not supported.
	*
	* @param string $url URL to image file
	*
	* @return array|null Array containing keys: id, image, image-th
	* @throws \Exception
	*/
	public function downloadImage($url) {
		$this->checkImagesRequirements();
		$this->checkCurlRequirements();
	
		$this->createTempFile();
		
		$this->downloadImageFile($url);
		$result = $this->saveImageInMediaLibrary();
		
		$this->deleteTempFile();
		
		return $result;
	}
	
	/**
	* Saves given image into the Media Library.
	* Returns image details as an array or exception if an error occurres. Custom thumbnail image is generated as well.
	*
	* @param string $imageData Raw image data
	*
	* @return array|null Array containing keys: id, image, image-th
	* @throws \Exception
	*/
	public function saveImage($imageData) {
		$this->checkImagesRequirements();
	
		$this->createTempFile();
		$this->saveTempFile($imageData);
		$result = null;
		if (is_array($this->getTempFileImageInfo(false))) {
			$result = $this->saveImageInMediaLibrary();
		}
		
		$this->deleteTempFile();
		
		return $result;
	}
	
	/**
	* Removes custom thumbnail image (generated by the plugin) for the given attachment.
	*
	* @param string $attachmentId
	*
	* @return null
	*/
	public function removeRelatedImages($attachmentId) {
		$imagePath = get_attached_file($attachmentId);
		$imageThPath = preg_replace('/\.([a-zA-Z]+)$/', '-th.$1', $imagePath);
		if (file_exists($imageThPath) && is_writable($imageThPath)) {
			unlink($imageThPath);
		}
	}
	
	/**
	* Downloads image file from given URL and saves it into the temporary file.
	* Exception is thrown in case of errors.
	*
	* @param string $url
	*
	* @return array|null
	* @throws \Exception
	*/
	private function downloadImageFile($url) {
		$imageData = $this->getDataOverHttp($url);
		$this->saveTempFile($imageData);
		
		return $this->getTempFileImageInfo(true);
	}
	
	/**
	* Performs HTTP request and returns resource stored under the given URL. 
	* Exception is thrown in case of errors.
	*
	* @param string $url
	*
	* @return string
	* @throws \Exception
	*/
	private function getDataOverHttp($url) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
		$data = curl_exec($curl);
		$httpStatus = intval(curl_getinfo($curl, CURLINFO_HTTP_CODE));
		
		if (curl_errno($curl)) {
			$this->logError('Resource downloading failure - cURL error: '.curl_errno($curl));
			curl_close($curl);
			throw new Exception('Resource could not be downloaded due to unknown error');
		}
		
		curl_close($curl);
		
		if ($httpStatus != 200) {
			$this->logError('Resource downloading failure - incorrect HTTP status: '.$httpStatus);
			throw new Exception('Resource could not be downloaded due to incorrect HTTP status code of the response');
		}
		
		if (strlen($data) > $this->options->getIntegerOption('images_size_limit', 3145728)) {
			$this->logError('Resource downloading failure - image is too big: '.strlen($data).' bytes');
			throw new Exception('Resource is too big to be downloaded');
		}
		
		return $data;
	}
	
	/**
	* Returns information about the image stored in the temporary file.
	* If the file is not an image an exception is thrown.
	*
	* @param boolean $safeResize
	*
	* @return array
	* @throws \Exception
	*/
	private function getTempFileImageInfo($safeResize) {
		$fileInfo = file_exists($this->tempFileName) ? getimagesize($this->tempFileName) : null;
		if (is_array($fileInfo)) {
			$mimeType = $fileInfo['mime'];
			if (!array_key_exists($mimeType, $this->supportedExtensions)) {
				$this->logError('Unsupported mime type: '.$mimeType);
				throw new Exception($this->options->getEncodedOption('message_error_7', 'Unsupported type of file'));
			}
			$fileName = date('Ymd-His').'-'.uniqid(rand()).'.'.$this->supportedExtensions[$mimeType];
			
			if ($safeResize) {
				$imageEditor = WiseChatContainer::get('services/WiseChatImageEditor');
				$imageEditor->load($this->tempFileName);
				$imageEditor->resize(
					$this->options->getIntegerOption('images_width_limit', 1000),
					$this->options->getIntegerOption('images_height_limit', 1000)
				);
				$imageEditor->build();
			}
			
			return $_FILES[self::UPLOAD_FILE_NAME] = array(
				'name' => $fileName,
				'type' => $mimeType,
				'tmp_name' => $this->tempFileName,
				'error' => 0,
				'size' => filesize($this->tempFileName),
			);
		}
		
		$this->logError('The file is not an image');
		throw new Exception($this->options->getEncodedOption('message_error_7', 'Unsupported type of file'));
	}
	
	/**
	* Saves image passed in $_FILES (under self::UPLOAD_FILE_NAME key) in the Media Library.
	* Returns null if an error occurs.
	*
	* @return array|null
	*/
	private function saveImageInMediaLibrary() {
		$result = null;
		
		require_once(ABSPATH.'wp-admin/includes/image.php');
		require_once(ABSPATH.'wp-admin/includes/file.php');
		require_once(ABSPATH.'wp-admin/includes/media.php');
		
		$attachmentId = media_handle_sideload($_FILES[self::UPLOAD_FILE_NAME], 0, null, array());
		
		if (is_wp_error($attachmentId)) {
			$this->logError('Error creating new entry in media library: '.$attachmentId->get_error_message());
			throw new Exception('The image could not be saved in the Media Library');
		} else {
			$result = array(
				'id' => $attachmentId,
				'image' => wp_get_attachment_url($attachmentId),
				'image-th' => $this->generateThumbnail($attachmentId)
			);
			
			$postUpdate = array(
				'ID' => $attachmentId,
				'post_title' => $_FILES[self::UPLOAD_FILE_NAME]['name']
			);
			wp_update_post($postUpdate);
		}
		
		return $result;
	}
	
	/**
	* Generates thumbnail image for given attachment and returns URL of the thumbnail.
	*
	* @param string $attachmentId
	*
	* @return null|string
    * @throws Exception
	*/
	private function generateThumbnail($attachmentId) {
		$imagePath = get_attached_file($attachmentId);
		$imageThPath = preg_replace('/\.([a-zA-Z]+)$/', '-th.$1', $imagePath);
		
		$image = wp_get_image_editor($imagePath);
		if (!is_wp_error($image)) {
			$image->resize(
				$this->options->getIntegerOption('images_thumbnail_width_limit', 60),
				$this->options->getIntegerOption('images_thumbnail_height_limit', 60),
				true
			);
			$image->save($imageThPath);
		} else {
			$this->logError('Error creating thumbnail: '.$image->get_error_message());
			throw new Exception('The thumbnail of the image could not be generated');
		}
		
		$imageUrl = wp_get_attachment_url($attachmentId);
		$imageThUrl = preg_replace('/\.([a-zA-Z]+)$/', '-th.$1', $imageUrl);
		
		return $imageThUrl;
	}
	
	/**
	* Checks requirements of images processing.
	*
	* @return null
	* @throws Exception
	*/
	private function checkImagesRequirements() {
		if (!extension_loaded('gd') || !function_exists('gd_info')) {
			$message = 'GD extension is not installed';
			$this->logError($message);
			throw new Exception($message);
		}
	}
	
	/**
	* Checks cURL requirement.
	*
	* @return null
	* @throws Exception
	*/
	private function checkCurlRequirements() {
		if (!extension_loaded('curl') || !function_exists('curl_init')) {
			$message = 'cURL extension is not installed';
			$this->logError($message);
			throw new Exception($message);
		}
	}
	
	/**
	* Saves given data in the temporary file.
	*
	* @param string $data
	*
	* @return null
	*/
	private function saveTempFile($data) {
		$fp = fopen($this->tempFileName,'w');
		fwrite($fp, $data);
		fclose($fp);
	}
	
	/**
	* Creates a temporary file in /tmp directory.
	*
	* @return null
	*/
	private function createTempFile() {
		$this->deleteTempFile();
		$this->tempFileName = tempnam('/tmp', 'php_files');
	}
	
	/**
	* Removes the temporary file which was created by the $this->createTempFile() method.
	*
	* @return null
	*/
	private function deleteTempFile() {
		if (strlen($this->tempFileName) > 0 && file_exists($this->tempFileName) && is_writable($this->tempFileName)){
			unlink($this->tempFileName);
		}
	}
	
	/**
	* Triggers PHP notice with error message.
	*
	* @return null
	*/
	private function logError($message) {
		@trigger_error('WordPress Wise Chat plugin error (ImagesService): '.$message, E_USER_NOTICE);
	}
	
}