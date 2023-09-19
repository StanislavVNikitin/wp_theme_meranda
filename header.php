<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Meranda
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
<?php wp_body_open(); ?>
<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                    <a href="<?php echo home_url('/');?>" class="site-logo">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                    <a href="<?php echo home_url('/');?>"
                       class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>
                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                    <?php get_template_part( 'template-parts/social_network'); ?>
                    <?php get_search_form();?>
                </div>
                <div class="col-6 d-block d-lg-none text-right">
                </div>
            </div>
        </div>


        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'header_menu',
                                    'container'=> false,
                                    'menu_class'=> 'site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block',
                                    'walker' => new Meranda_Menu(),
                                )
                            );?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>