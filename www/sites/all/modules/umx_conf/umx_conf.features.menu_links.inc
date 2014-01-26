<?php
/**
 * @file
 * umx_conf.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function umx_conf_menu_default_menu_links() {
  $menu_links = array();

  $menu_links['main-menu_portada:<front>'] = array(
    'menu_name' => 'main-menu',
    'link_path' => '<front>',
    'router_path' => '',
    'link_title' => 'Portada',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_portada:<front>',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
  );

  $menu_links['main-menu_foros:http://google.com'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'http://google.com',
    'router_path' => '',
    'link_title' => 'Foros',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_foros:http://google.com',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 1,
    'customized' => 1,
  );

  $menu_links['main-menu_preguntas:http://ubuntu.shapado.com'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'http://ubuntu.shapado.com',
    'router_path' => '',
    'link_title' => 'Preguntas',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_preguntas:http://ubuntu.shapado.com',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 2,
    'customized' => 1,
  );

  $menu_links['main-menu_wiki:https://wiki.ubuntu.com/UbuntuMxTeam'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'https://wiki.ubuntu.com/UbuntuMxTeam',
    'router_path' => '',
    'link_title' => 'Wiki',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_wiki:https://wiki.ubuntu.com/UbuntuMxTeam',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 3,
    'customized' => 1,
  );

  $menu_links['main-menu_chat:http://google.com'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'http://google.com',
    'router_path' => '',
    'link_title' => 'Chat',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_chat:http://google.com',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 4,
    'customized' => 1,
  );
  // Exported menu link: main-menu_descargar-ubuntu:http://google.com
  $menu_links['main-menu_descargar-ubuntu:http://google.com'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'http://google.com',
    'router_path' => '',
    'link_title' => 'Descargar Ubuntu',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_descargar-ubuntu:http://google.com',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 5,
    'customized' => 1,
  );

  // Translatables
  // Included for use with string extractors like potx.
  t('Portada');
  t('Foros');
  t('Preguntas');
  t('Wiki');
  t('Chat');
  t('Descargar Ubuntu');
  t('Foros');

  return $menu_links;
}
