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
                        <a href="http://54.149.34.85/cun/platform/ciencias-exactas-socioculturales/">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/red1.png" alt="" width="38">
                          <span>CIENCIEAS EXACTAS<br>SOCIOCULTURALES</span>13
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
<section class="container line-banner">
    <img src="<?php echo get_template_directory_uri(); ?>/images/macrolinea.png" alt="">
</section>
<section class="container line-description">
    <h2>Asesora en línea: <span>Karina Bravo</span></h2>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin rutrum lectus ex, at sodales mauris hendrerit a. Ut efficitur commodo nisl, sed porttitor eros vestibulum sit amet. Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus, nec dapibus nibh. Nullam eget purus in purus pulvinar dictum vitae vel odio.
    </p>
    <a href="#nogo" class="more-info">Ampliar información</a>
</section>
<section class="container proyects">
    <div class="col-md-9 search-proyects">
        <h3 class="title">PROYECTOS</h3>
        <div>ESPACIO PARA BUSQUEDA</div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="" width="108">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
            </div>
        </div>
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