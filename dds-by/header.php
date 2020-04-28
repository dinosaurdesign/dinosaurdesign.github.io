<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dds.by
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!--    google-->
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NN7D6F4');</script>
    <!-- End Google Tag Manager -->
    <!--    my meta-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <meta name="yandex-verification" content="99453e13271005c1"/>
    <meta name="google-site-verification" content="5nNl7hqdqYAYVtR_xVrSuEZvOWfzs9EJGBoMEVtBCGg"/>
    <!--    my links-->
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link type="text/plain" rel="author" href="https://dds.by/humans.txt"/>
    <link rel="manifest" href="https://dds.by/site.webmanifest"/>
    <link rel="preload"
          href="<?php echo get_template_directory_uri(); ?>/fonts/gilroy/regular/gilroy-regular-webfont.woff" as="font"
          type="font/woff" crossorigin="anonymous"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<header id="masthead" class="header site-header" itemscope itemtype="http://schema.org/WPHeader">

    <nav class="menu__container fixed-top">
		<?php the_custom_logo(); ?>
        <button id="hamburger" class="hamburger hamburger--spring d-md-none">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </button>
        <div id="menu" class="menu__list list__none d-md-flex" itemscope
             itemtype="http://www.schema.org/SiteNavigationElement">
            <h2 class="text-left d-md-none">Dinnersaur<br/>Design<br/>Studio</h2>
			<?php
			$args = array(
				'container'       => 'ul',
				'container_class' => '',
				'container_id'    => '',
				'theme_location'  => 'Primary',
				'menu'            => 'Primary',
				'menu_class'      => 'menu__list ',
				'menu_id'         => 'menu',
				'echo'            => true,
//				'fallback_cb'    => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<li class="%2$s" > <a  href="">%3$s</a></li>',
				'depth'           => - 1,
				'walker'          => '',
			);
			wp_nav_menu( $args );
			?>
            <ul class="navigation__social-mobile d-md-none">
                <li><a href="https://www.behance.net/DinnersaurDesign" target="_blank"><img
                                src="<?php echo get_template_directory_uri(); ?>/img/icons/behance.svg"
                                alt="Ресторанный дизайн Витебск"/></a></li>
                <li><a href="https://vk.com/dinnersaurdesign" target="_blank"><img
                                src="<?php echo get_template_directory_uri(); ?>/img/icons/vk.svg"
                                alt="Ресторанный дизайн Витебск"/></a></li>
                <li><a href="https://www.instagram.com/DinnersaurDesign/" target="_blank"><img
                                src="<?php echo get_template_directory_uri(); ?>/img/icons/in-logo.svg"
                                alt="Ресторанный дизайн Витебск"/></a></li>
            </ul>
        </div>

        <!--	social desctop-->
        <ul class="navigation__social d-none d-md-flex">
            <li><a href="https://www.behance.net/DinnersaurDesign" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/img/icons/behance.svg"
                            alt="Ресторанный дизайн Витебск"/></a></li>
            <li><a href="https://vk.com/dinnersaurdesign" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/img/icons/vk.svg"
                            alt="Ресторанный дизайн Витебск"/></a></li>
            <li><a href="https://www.instagram.com/DinnersaurDesign/" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/img/icons/in-logo.svg"
                            alt="Ресторанный дизайн Витебск"/></a></li>
        </ul>
    </nav>

</header><!-- #masthead -->
<main class="container-fluid site-content">


