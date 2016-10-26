<?php

use RumbleTalk\RumbleTalkSDK;

class RumbleTalkChatAjax {

    public function __construct() {
    }

    public function processAjaxRequest($method, $args) {
    	if ($method == 'apply_new_token')
    		$this->applyNewToken($args);
    	else if ($method == 'get_access_token')
    		$this->getAccessToken($args);
    }

    private function validateTokenArgs($args) {
    	$valid = isset($args['key']) && $args['key'] && isset($args['secret']) && $args['secret'];
    	if (!$valid) {
    		$error = new stdClass();
    		$error->status = false;
    		$error->message = "Please provide token";
    		die(json_encode((array)$error));
    	}
    }

    public function applyNewToken($args) {
    	$this->validateTokenArgs($args);

		# Initialize key and secret with default values
		$appKey = $args['key'];
		$appSecret = $args['secret'];

		# create the RumbleTalk SDK instance using the key and secret
		$rumbletalk = new RumbleTalkSDK($appKey, $appSecret);

		try {
			# fetch (and set) the access token for the account (tokens lasts for 30 days)
			$accessToken = $rumbletalk->fetchAccessToken($expiration);
		}
		catch(Exception $e) {
    		$error = new stdClass();
    		$error->status = false;
    		$error->message = $e->getMessage();
    		die(json_encode((array)$error));
		}

		$result = $rumbletalk->get('chats');

		if ($result['status']) {
			# Get hash of the first chat for the account
			$hash = $result['data'][0]['hash'];
			$result = array('status' => true, 'hash' => $hash);

			# Update option
			update_option('rumbletalk_chat_code', $hash);
			die(json_encode((array)$result));
		}
		else {
			$error = new stdClass();
			$error->status = false;
			$error->message = "Cannot retrieve chat";
			$error->details = $result;
			die(json_encode((array)$error));
		}
	}

    public function getAccessToken($args) {
    	$this->validateTokenArgs($args);

		# Initialize key and secret with default values
		$appKey = $args['key'];
		$appSecret = $args['secret'];

		# create the RumbleTalk SDK instance using the key and secret
		$rumbletalk = new RumbleTalkSDK($appKey, $appSecret);

		try {
			# fetch (and set) the access token for the account (tokens lasts for 30 days)
			$accessToken = $rumbletalk->fetchAccessToken($expiration);
		}
		catch(Exception $e) {
    		$error = new stdClass();
    		$error->status = false;
    		$error->message = $e->getMessage();
    		die(json_encode((array)$error));
		}

		$result = array('status' => true, 'accessToken' => $accessToken);
		die(json_encode((array)$result));
	}
}

?>