<?php
/**
* Plugin Name: making-project
* Plugin URI: https://
* Description: This plugin adds a widget making project
* Version: 1.0.0
* Author: iader lorduy
* Author URI:
* License: GPL2
*/

add_action('admin_menu', 'making_project_setup_menu');
 
function making_project_setup_menu(){
        add_menu_page( 'Making Project Page', 'Making Project', 'manage_options', 'test-plugin', 'test_init' );
}
 function test_init(){
        
?>
        <h1>Agregar nuevo Proyecto</h1>

        <!-- Form to handle the upload - The enctype value here is very important -->
        <form  method="post" enctype="multipart/form-data">
		<fieldset>

<!-- Form Name -->
<legend>Agregar nuevo Proyecto</legend>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtplanproblema">Planteamiento del Problema</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtplanproblema" name="txtplanproblema"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtObjetivo">Objetivo</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtObjetivo" name="txtObjetivo"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtResultados">Resultados</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtResultados" name="txtResultados"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtbibliografia">bibliografía</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txtbibliografia" name="txtbibliografia"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="test_upload_pdf">Imagenes</label>
  <div class="col-md-4">                     
     <input type='file' id='test_upload_pdf' name='test_upload_pdf' multiple></input>
  </div>
</div>

</fieldset>

               
                <?php submit_button('Guardar') ?>
        </form>
<?php
}
 

 
?>
