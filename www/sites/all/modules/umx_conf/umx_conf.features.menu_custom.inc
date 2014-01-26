<?php
/**
 * @file
 * umx_conf.features.menu_custom.inc
 */

/**
 * Implements hook_menu_default_menu_custom().
 */
function umx_conf_menu_default_menu_custom() {
  $menus = array();

  // Exported menu: main-menu.
  $menus['main-menu'] = array(
    'menu_name' => 'main-menu',
    'title' => 'Menú principal',
    'description' => 'El menú <em>Principal</em> se usa en muchos sitios web para mostrar las secciones principales del sitio, generalmente en una barra de navegación superior.',
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('El menú <em>Principal</em> se usa en muchos sitios web para mostrar las secciones principales del sitio, generalmente en una barra de navegación superior.');
  t('Menú principal');


  return $menus;
}
