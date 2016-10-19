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
    <section class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="...">
                </div>
                <div class="item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/banner.png" alt="...">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
    </section>
    <section class="container" id="knowledges-lines">
        <div class="row">
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red1.png" alt="">
                <h5>CIENCIEAS EXACTAS SOCIOCULTURALES</h5>
            </div>
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red2.png" alt="">
                <h5>CIENCIEAS EXACTAS Y ESPECÍFICAS Y EDUCACIÓN AMBIENTAL</h5>
            </div>
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red3.png" alt="">
                <h5>TECNOLOGÍAS E INNOVACCIÓN</h5>
            </div>
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red4.png" alt="">
                <h5>EDUCACIÓN Y PEDAGOGÍA</h5>
            </div>
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red5.png" alt="">
                <h5>LENGUAJE, EDUCACIÓN Y ARTÍSTICA</h5>
            </div>
            <div class="col-md-2">
                <img src="<?php echo get_template_directory_uri(); ?>/images/red6.png" alt="">
                <h5>EMPRENDIMIENTO</h5>
            </div>
        </div>
    </section>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
                <h3 class="news">NOTICIAS</h3>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 middle-col">
                <h3 class="calendar">CALENDARIO</h3>
            </div>
            <div class="col-md-3 right-col">
                <h3 class="twitter">TWITTER</h3>
            </div>
        </div>
    </section>
    <section class="container three-cols">
        <div class="row">
            <div class="col-md-6 left-col">
                <h3 class="blog">BLOG</h3>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 image-article">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article.png" alt="">
                    </div>
                    <div class="col-md-8 content-article">
                        <h5 class="title-article">Lorem ipsum dolor sit amet</h5>
                        <content>
                            Donec semper tortor finibus, fermentum odio sit amet, bibendum nunc. Nullam luctus, magna a molestie lacinia, mi tortor mattis est, non egestas risus magna ut purus. Maecenas vel gravida lectus.
                        </content>
                        <a href="#nogo" class="know-more">CONOCER MÁS</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 middle-col">
                <h3 class="comments">COMENTARIOS RECIENTES</h3>
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
            <div class="col-md-3 right-col">
                <h3 class="login">LOGIN</h3>
                <div class="row">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Usuario</label>
                            <input type="email" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="checkbox">
                            <label>
                            <input type="checkbox"> Recordarme
                            </label>
                        </div>
                        <a href="#nogo">Olvide contraseña</a>
                        <button type="submit" class="btn btn-default">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
    get_footer();
?>