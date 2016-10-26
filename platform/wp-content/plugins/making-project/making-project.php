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
    $contenido = "<p>Integrantes:<span>" + $_POST['nmIntegrantes'] + "</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'>Red de Conocimiento</span></p>";
    $contenido .="<p style='text-align: left;'><span>"+ $_POST['selectbasic']+"</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'>Planteamiento del Problema</span></p>";
    $contenido .="<p><span>" + $_POST['txtplanproblema'] + "</span></p>";
    $contenido .="<p style='text-align: center;'><span style='text-decoration: underline;'><span>Objetivos</span></span></p>";
    $contenido .="<p style='text-align: left;'>General</p>";
    $contenido .="<ul>";
    $contenido .="<li style='text-align: left;'><span>" + $_POST['txtObjetivoG'] + "</span></li>";
    $contenido .="</ul>";
    $contenido .="<p style='text-align: left;'>Especificos</p>";
    $contenido .="<ul>";
    $contenido .="<li style='text-align: left;'><span>" + $_POST['txtObjetivoG'] + "</span></li>";
    $contenido .="</ul>";

    console_log( $contenido ); // [1,2,3]

    $my_post = array(
      'post_title'    => wp_strip_all_tags( $_POST['nmProyecto'] ),
      'post_content'  => $contenido,
      'post_status'   => 'publish',
      'post_author'   => $user->ID,
      'post_type' => 'proyecto'
    );

    // Insert the post into the database
    $post_id = wp_insert_post( $my_post, $wp_error );

    if($post_id =! null)
    {
      echo ("Proyecto Guardado Exitosamente");
    }
  }
  else   {
    ?>
    <h1>Agregar nuevo Proyecto</h1>

    <!-- Form to handle the upload - The enctype value here is very important -->
    <form  method="post" enctype="multipart/form-data">
      <fieldset>

        <!-- Form Name -->
        <legend>Agregar nuevo Proyecto</legend>

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
              <option value="CIENCIEAS EXACTAS SOCIOCULTURALES">CIENCIEAS EXACTAS SOCIOCULTURALES</option>
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
          <label class="col-md-4 control-label" for="txtInstitucioneducativa">Institución educativa</label>
          <div class="col-md-6">
            <input id="txtInstitucioneducativa" style="width:50%;" name="txtInstitucioneducativa" placeholder="" class="form-control input-md" type="text">

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="txtMunicipio">Municipio</label>
          <div class="col-md-6">
            <input id="txtMunicipio" style="width:50%;" name="txtMunicipio" placeholder="" class="form-control input-md" type="text">

          </div>
        </div>

        <!-- Text input-->
        <!--<div class="form-group">
        <label class="col-md-4 control-label" for="txtGrupo">Grupo de Investigación</label>
        <div class="col-md-6">
        <select id="txtGrupo" name="txtGrupo" class="form-control">
        <option value="-1"></option>
        <?php
        $vgroups = $groups = BP_Groups_Group::get(array(
        'type'=>'alphabetical',
        'per_page'=>999
      ));
      $longitud = count($vgroups['groups']);

      for ($i=0; $i < $longitud; $i++) {
      $var = $vgroups['groups'][$i];?>
      <option><?=$var->name?></option>
      <?php }


      ?>


    </select>

  </div>
</div>-->
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="nmMetodolo">Metodologia</label>
  <div class="col-md-6">
    <textarea class="form-control" style="width:50%;" id="nmMetodolo" name="nmMetodolo"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtDocente">Docente Coo-Investigador</label>
  <div class="col-md-6">
    <input id="txtDocente" style="width:50%;" name="txtDocente" placeholder="" class="form-control input-md" type="text">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtIntegrantes">Integrantes</label>
  <div class="col-md-6">
    <textarea class="form-control" style="width:50%;" id="txtIntegrantes" name="txtIntegrantes "></textarea>
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
  <label class="col-md-4 control-label" for="txtObjetivoG">Objetivos Generales</label>
  <div class="col-md-6">
    <textarea class="form-control" style="width:50%;" id="txtObjetivoG" name="txtObjetivoG"></textarea>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtObjetivoE">Objetivos Especificos</label>
  <div class="col-md-6">
    <textarea class="form-control" style="width:50%;" id="txtObjetivoE" name="txtObjetivoE"></textarea>
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

<!-- <div class="form-group">
<label class="col-md-4 control-label" for="test_upload_pdf">Imagenes</label>
<div class="col-md-6">
<input type='file' id='test_upload_pdf' name='test_upload_pdf' multiple></input>
</div>
</div> -->

</fieldset>


<?php submit_button('Guardar') ?>
</form>
<?php
}
}


?>
