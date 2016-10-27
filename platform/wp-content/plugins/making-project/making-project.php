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
  add_menu_page( 'Making Project Page', 'Mis Proyectos', 'manage_options', 'test-plugin', 'test_init' );
}
function test_init(){
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  if (!empty($_POST)) {
    $user = wp_get_current_user();
    $contenido = "";
    $contenido .= "<p>Integrantes:<span>" .  $_POST['nmIntegrantes'] . "</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'>Red de Conocimiento</span></p>";
    $contenido .="<p style='text-align: left;'><span>".  $_POST['selectbasic'] . "</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'>Planteamiento del Problema</span></p>";
    $contenido .="<p><span>" . $_POST['txtplanproblema'] . "</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'><span>Objetivos</span></span></p>";
    $contenido .="<p style='text-align: left;'>General</p>";
    $contenido .="<ul>";
    $contenido .="<li style='text-align: left;'><span>" . $_POST['txtObjetivoG'] ."</span></li>";
    $contenido .="</ul>";
    $contenido .="<p style='text-align: left;'>Especificos</p>";
    $contenido .="<ul>";
    $contenido .="<li style='text-align: left;'><span>" . $_POST['txtObjetivoG']. "</span></li>";
    $contenido .="</ul>";


    //     <h2><span style="color: #ff0000;">Nombre del Proyecto</span></h2>
    // <span style="color: #000000;">Octubre 10 de 2006</span>
    //
    // <span style="color: #ff0000;"><span style="color: #000000;">Asesora en línea:</span>
    // <span style="color: #000000;"><strong>Karina Bravo</strong></span></span>
    // <div>
    //
    //  <img class="wp-image-99 alignleft" src="http://localhost/cun/platform/wp-content/uploads/2016/10/photo-1428542244207-0aaec316e609-300x200.jpg" alt="photo-1428542244207-0aaec316e609" width="332" height="221" />Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget erat at enim tincidunt iaculis. Curabitur imperdiet sodales orci a viverra. Proin porttitor, tellus et ultricies mattis, metus neque eleifend turpis, ac posuere dolor metus vitae leo. Mauris a nulla ut turpis lacinia tincidunt sed vitae est. Aenean tristique mauris nibh, et condimentum lacus euismod ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec finibus tincidunt purus, sed ultrices nulla scelerisque at. Nunc aliquet eros eu maximus malesuada. Morbi dignissim facilisis augue vel tristique. Cras nec congue velit. Proin vulputate tortor tempor erat lobortis, vitae accumsan neque facilisis. Donec justo velit, vestibulum vel iaculis euismod, tincidunt id sem. Fusce at nunc et enim aliquet efficitur. Maecenas aliquet vestibulum felis, nec accumsan quam molestie sit amet.
    //
    // In in ultricies diam. Quisque felis nibh, pretium sit amet dignissim a, viverra in lorem. Integer auctor velit at luctus ullamcorper. Mauris consequat, neque eu laoreet fringilla, sem ligula ornare turpis, quis tempus nisi purus eu lacus. Suspendisse nec consequat orci. Donec mi urna, ornare vel venenatis non, volutpat ut quam. Proin vel magna turpis. Maecenas convallis fermentum dictum. Nunc congue vehicula arcu. Vestibulum lacinia facilisis neque et suscipit. Aenean luctus nulla nec magna suscipit, ac rhoncus diam interdum. In ac orci id orci pharetra rutrum.
    //
    // Aliquam a porttitor magna. Praesent sed purus felis. Ut porttitor vestibulum lacus, eget pulvinar nunc egestas eget. Morbi id purus quam. Suspendisse ante lacus, dictum quis mauris ac, condimentum volutpat turpis. Donec sit amet magna scelerisque, tristique dolor scelerisque, condimentum velit. Sed volutpat, erat eu congue placerat, nunc justo tincidunt dolor, et ultricies mauris turpis vel neque. Suspendisse facilisis metus turpis, faucibus blandit eros pulvinar nec. Nam blandit pellentesque tempus. Vestibulum mi leo, congue nec urna eu, lobortis rutrum neque. Morbi vitae blandit elit. Mauris ut fringilla ligula, consequat pharetra mi. Praesent quam nunc, consectetur a finibus iaculis, ornare eget arcu.
    //
    // </div>


    $my_post = array(
      'post_title'    => wp_strip_all_tags( $_POST['nmProyecto'] ),
      'post_content'  => $contenido,
      'post_status'   => 'publish',
      'post_author'   => $user->ID,
      'post_type' => 'proyecto'
    );

    // Insert the post into the database
    //  $post_id = wp_insert_post( $my_post, $wp_error );
    console_log($_FILES["fileToUpload"]);

    if($post_id =! null)
    {
      echo ("Proyecto Guardado Exitosamente");
      echo ($post_id);
      echo ($_FILES['fileToUpload']);
    }
  }
  //else   {
  ///  ?>
  <h1>Agregar nuevo Proyecto</h1>

  <!-- Form to handle the upload - The enctype value here is very important -->
  <form  method="post" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="nmProyecto">Título de investigación</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="nmProyecto" name="nmProyecto"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Red de conocimiento</label>
            <div class="col-md-6">
              <select id="selectbasic" name="selectbasic" class="form-control">
                <option value=""></option>
                <option value="23">CIENCIEAS EXACTAS SOCIOCULTURALES</option>
                <option value="24">CIENCIEAS EXACTAS Y ESPECÍFICAS Y EDUCACIÓN AMBIENTAL</option>
                <option value="25">TECNOLOGÍAS E INNOVACCIÓN</option>
                <option value="26">EDUCACIÓN Y PEDAGOGÍA</option>
                <option value="27">LENGUAJE, EDUCACIÓN Y ARTÍSTICA</option>
                <option value="28">EMPRENDIMIENTO</option>
              </select>
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtSublineaconocimiento">Sublínea de conocimiento</label>
            <div class="col-md-6">
              <input id="txtSublineaconocimiento" style="width:50%;" name="txtSublineaconocimiento" placeholder="" class="form-control input-md" type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label" for="test_upload_pdf">Imagen Grupo</label>
            <div class="col-md-6">
              <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtMunicipio">Municipio</label>
            <div class="col-md-6">
              <input id="txtMunicipio" style="width:50%;" name="txtMunicipio" placeholder="" class="form-control input-md" type="text">

            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtplanproblema">Planteamiento del Problema</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="txtplanproblema" name="txtplanproblema"></textarea>
            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtObjetivoG">Objetivos</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="txtObjetivo" name="txtObjetivoG"></textarea>
            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="nmMetodolo">Metodologia</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="nmMetodolo" name="nmMetodolo"></textarea>
            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtResultados">Resultados</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="txtResultados" name="txtResultados"></textarea>
            </div>
          </div>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtbibliografia">bibliografía</label>
            <div class="col-md-6">
              <textarea class="form-control" style="width:50%;" id="txtbibliografia" name="txtbibliografia"></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-3">



        </div>
      </div>
    </div>

    <?php submit_button('Guardar') ?>
  </form>
  <?php
  //}
}


?>
