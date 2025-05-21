<?php

/**
 * @package Bootscore Child
 *
 * @version 6.0.0
 */


// Exit if accessed directly
defined('ABSPATH') || exit;


/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // custom.js
  // Get modification time. Enqueue file with modification date to prevent browser from loading cached scripts when file content changes. 
  $modificated_CustomJS = date('YmdHi', filemtime(get_stylesheet_directory() . '/assets/js/custom.js'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), $modificated_CustomJS, false, true);
}

// Agregar un nuevo tamaño de imagen con recorte
add_action('after_setup_theme', 'custom_image_sizes');
function custom_image_sizes()
{

  add_image_size('custom-size', 400, 240, true);
}

add_filter('image_size_names_choose', 'custom_image_sizes_names');
function custom_image_sizes_names($sizes)
{
  return array_merge($sizes, [
    'custom-size' => __('Tamaño Personalizado', 'bootscore-child'),
  ]);
}

// Solo muestra la fecha de publicación
function bootscore_date()
{
  echo get_the_date();
}

// Desactiva comentarios en todo el sitio
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Oculta el área de comentarios en las plantillas
add_filter('comments_template', function () {
  return dirname(__FILE__) . '/no-comments.php';
});

add_action('acf/init', 'my_acf_init_blocks');
function my_acf_init_blocks()
{
  // Verifica que la función exista (que ACF esté activo)
  if (!function_exists('acf_register_block_type')) {
    return;
  }

  // Registrar el bloque PROGRAMA
  acf_register_block_type(array(
    'name'              => 'block-programa',
    'title'             => __('Bloque Programa', 'bootscore-child'),
    'description'       => __('Bloque personalizado para mostrar programas', 'bootscore-child'),
    'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/block-programa/index.php',
    'category'          => 'bemycelium',
    'icon'              => 'admin-links',
    'keywords'          => array('programa', 'custom'),
  ));

  // Bloque Taller
  acf_register_block_type(array(
    'name'              => 'block-taller',
    'title'             => __('Bloque Taller', 'bootscore-child'),
    'description'       => __('Muestra un taller concreto', 'bootscore-child'),
    'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/block-taller/index.php',
    'category'          => 'bemycelium',
    'icon'              => 'admin-users',
    'keywords'          => array('taller', 'curso', 'evento'),
  ));

  // Bloque Hero Banner
  acf_register_block_type(array(
    'name'              => 'hero-banner',
    'title'             => __('Hero Banner', 'bootscore-child'),
    'description'       => __('Hero con diapositivas y menú anchor', 'bootscore-child'),
    'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/block-hero/index.php',
    'category'          => 'bemycelium',
    'icon'              => 'slides',
    'keywords'          => array('hero', 'banner', 'diapositivas'),
  ));
}
