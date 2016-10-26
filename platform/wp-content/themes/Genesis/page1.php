<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Genesis
 * @since Genesis 1.0
 */
    get_header();
?>
<section class="container navigation-options">
        <div class="row">
            <div class="col-md-6">Home > Redes del conocimiento > Proyectos > Ciencias Socioculturales </div>
            <div class="col-md-6">
                <div class="dropdown change-line">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        CAMBIAR RED <img src="<?php echo get_template_directory_uri(); ?>/images/little-cow.png" alt="">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red1.png" alt="" width="38">
                                <span>CIENCIEAS EXACTAS<br>SOCIOCULTURALES</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red2.png" alt="" width="38">
                                <span>CIENCIAS EXACTAS<br>Y ESPECÍFICAS Y <br>EDUCACIÓN AMBIENTAL</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red3.png" alt="" width="38">
                                <span>TECNOLOGÍAS<br>E INNOVACCIÓN</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red4.png" alt="" width="38">
                                <span>LENGUAJE, EDUCACIÓN<br>Y ARTÍSTICA</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red5.png" alt="" width="38">
                                <span>EDUCACIÓN<br>Y PEDAGOGÍA</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/red6.png" alt="" width="38">
                                <span>EMPRENDIMIENTO</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="container project">
        <div class="col-md-9">
            <h1 class="title">Nombre del proyecto</h1>
            <h4 class="date-project">Octubre 10 de 2016</h4>
            <h3>Asesora en línea:</h3>
            <h3 class="name-adviser">Karina Bravo:</h3>
            <article>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum lectus ex, at sodales mauris hendrerit a. Ut efficitur commodo nisl, sed porttitor eros vestibulum sit amet. 
                Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. 
                Maecenas vel gravida lectus, nec dapibus nibh. Nullam eget purus in purus pulvinar dictum vitae vel odio. <br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum lectus ex, at sodales mauris hendrerit a. Ut efficitur commodo nisl, sed porttitor eros vestibulum sit amet. 
                Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. 
                Maecenas vel gravida lectus, nec dapibus nibh. Nullam eget purus in purus pulvinar dictum vitae vel odio. 
            </article>
        </div>
        <div class="col-md-3 inline-users">
            <div class="row">
                <h3 class="title online">USUARIOS EN LÍNEA</h3>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
                <div class="row the-users">
                    <div class="col-md-2 image-profile">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-8 name-user">
                        SANTIAGO TORRES
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="title comments">COMENTARIOS RECIENTES</h3>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
                <div class="row last-comments">
                    <div class="col-md-3 profile-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/profile.jpg" alt="">
                    </div>
                    <div class="col-md-9">
                        <h6>FRANK TORRES</h6>
                        <content>
                            <p>Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc.</p>    
                        </content> 
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
    get_footer();
?>