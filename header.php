<?php
/**
 * Header del tema
 *
 * Questo template mostra tutta la sezione <head> e il codice generato fino a  <main>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _digital_library
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class('d-flex flex-column'); ?> itemscope="" itemtype="http://schema.org/WebPage">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <div class="container">
        <a class="skip-link screen-reader-text sr-only sr-only-focusable" href="#primary"><?php esc_html_e( 'Passa al contenuto', '_digital_library' ); ?></a>

        <header id="masthead" class="site-header row">

            <div class="site-branding">
                <?php
                the_custom_logo();
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title h1" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $_digital_library_description = get_bloginfo( 'description', 'display' );
                if ( $_digital_library_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description" itemprop="description"><?php echo $_digital_library_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation navbar navbar-expand-md navbar-light bg-light">
                
                    <!-- Brand and toggle get grouped for better mobile display -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					        <span class="navbar-toggler-icon"></span>
					    <?php esc_html_e( 'Menu', '_digital_library' ); ?>
				        </button>
                        
                        <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'primary-menu',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                        ) );
                        ?>
                    
                </nav><!-- #site-navigation .main-navigation -->

	    </header><!-- #masthead --> 
        <div id="wrapper" class="row">