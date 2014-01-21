<?php
// $Id$

/**
 * @file
 * Core functions for the operations of the theme
 */

/**
*  * Override of theme_breadcrumb().
*   */
function udtheme_breadcrumb($variables) {

  # Show breadcrumb only in admin pages
  if (module_exists('path')) {
    $alias = drupal_get_path_alias($_GET['q']);
    $baseurl = explode('/', $alias);
    if ($baseurl[0] == 'admin') {
      $breadcrumb = $variables['breadcrumb'];
      if (!empty($breadcrumb)) {
        // Provide a navigational heading to give context for breadcrumb links to
        // screen-reader users. Make the heading invisible with .element-invisible.
        $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
        $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
        return $output;
      }
    }
  }
}

/**
 * hook_form_alter()
 * Override display of search block.
 */
function udtheme_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = '';
    $form['search_block_form']['#title_display'] = 'invisible';
    $form['search_block_form']['#default_value'] = t('Search...');
    $form['actions']['submit']['#value'] = t('Go');

    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search...';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search...') {this.value = '';}";
  }
}

/**
 * hook_preprocess_page
 * Generate / override exsisting variables
 */
function udtheme_preprocess_page(&$vars) {
  $vars['menu']         = udtheme_whichmenu($vars['main_menu']);
  $vars['submenu']      = udtheme_secondary_menu($vars['secondary_menu']);
  $vars['logo']         = udtheme_buildlogo($vars);
  $vars['search']       = udtheme_render_search();

  drupal_add_html_head(
    array(
      '#type' => 'markup',
      '#markup' => udtheme_pagesize(),
    ),
    'udtheme-pagesize'
  );

  if ($trademark = udtheme_trademark()) {
    $vars['css']        = drupal_add_css($trademark);
    $vars['styles']     = drupal_get_css();
  }
  elseif ($pallette = udtheme_pallette()) {
    $vars['css']        = drupal_add_css($pallette);
    $vars['styles']     = drupal_get_css();
  }

  # Set node type to news if string "news" is in url
  if (module_exists('path')) {
    $alias = drupal_get_path_alias($_GET['q']);
    $baseurl = explode('/', $alias);
    if ($baseurl[0] == 'news')
        $vars['node']->type = 'news';
    }
}

/**
 * Automatically use the nice_menu module if available
 * If not available, no drop downs will be displayed
 */
function udtheme_whichmenu($primary_links) {

  if (module_exists('nice_menus')) {
    // Nice Menu
    $themed_menu = theme('nice_menus', array('direction' => 'down', 'depth' => 1, 'menu_name' => 'main-menu'));
    $menu = $themed_menu['content'];
  }
  else {
    // Standard Menu
    $menu = theme('links', array('links' => $primary_links));
  }

  if (isset($menu)) {
    return $menu;
  }
}

/**
 * Generate a logo if the variable exists
 */
function udtheme_buildlogo($vars) {
  if ($vars['logo']) {
    $logo = '<div id="logo">' .
            '  <a href="' . check_url($vars['front_page']) . '" title="' . $vars['site_name'] . '">' .
            '    <img src="' . check_url($vars['logo']) . '" alt="' . $vars['site_name'] . '" />' .
            '  </a>' .
            '</div>';
  }

  if (isset($logo)) {
    return $logo;
  }
}

/**
 * Render the search block as a themed area.
 * This was removed in D7.
 */
function udtheme_render_search() {
  if (theme_get_setting('render_search')) {
    $search  = '<div id="search" class="block block-theme">';
    $search .= render(drupal_get_form('search_block_form'));
    $search .= '</div>';
    return $search;
  }
  else {
    return NULL;
  }
}

/**
 * Generate the default footer text.
 * This big ugly thing keeps us from needing to set the default in udtheme.info.
 */
function udtheme_footer_text() {
  // The default in udtheme.info is 'unset'
  if (theme_get_setting('ubuntu_footer_text') == 'unset') {
    return t('<div class="block"><h2>@legal</h2> !copy </div>'
      . '<div class="block"><h2>@more</h2>!getubuntu !brainstorm !forums !spread </div>',
      array(
        '@legal' => t('Legal Disclaimer'),
        '!copy' => t('&copy; 2010 Canonical Ltd. Ubuntu and Canonical are registered trademarks of Canonical Ltd.'),
        '@more' => t('More Ubuntu'),
        '!getubuntu' => l(t('Get Ubuntu'), 'http://ubuntu.com/getubuntu/download/'),
        '!brainstorm' => l(t('Ubuntu Brainstorm'), 'http://brainstorm.ubuntu.com/'),
        '!forums' => l(t('Ubuntu Forums'), 'http://ubuntuforums.org/'),
        '!spread' => l(t('Spread Ubuntu'), 'http://spreadubuntu.neomenlo.org/'),
      )
    );
  }
  else {
    return theme_get_setting('ubuntu_footer_text');
  }
}

/**
 * Theme setting to either show or hide extra help
 */
function udtheme_help($help = NULL) {
  return theme_get_setting('display_help') ? $help : NULL;
}

/**
 * Build some CSS to set the width of the page.
 * Not optimal, but it works.
 */
function udtheme_pagesize() {
  $width_max = theme_get_setting('page_maxwidth');
  $width_min = theme_get_setting('page_minwidth');
  if (!isset($width_min) || $width_min == '') {
    $width_min = $width_max;
  }

  $css =  '<style type="text/css">';
  $css .= '.container {';
  $css .= '  min-width: ' . $width_min . ';';
  $css .= '  max-width: ' . $width_max . ';';
  $css .= '}';
  $css .= '#header {';
  $css .= '  min-width: ' . $width_min . ';';
  $css .= '}';
  $css .= '</style>';

  return $css;
}

/**
 * Return style sheet theme to be added to base style
 */
function udtheme_pallette() {
    return path_to_theme() . '/styles/' . theme_get_setting('udtheme_style') . '.css';
}

/**
 * Add CSS for trademarked sites. Trademarked CSS files are download into the
 * temporary CSS directory.
 */
function udtheme_trademark() {
  if (theme_get_setting('udtheme_trademark')) {
    $csspath = file_create_path('css');
    foreach (array('trademark-rtl.css', 'trademark.css') as $filename) {
      $filepath = $csspath .'/'. $filename;
      $download = !file_exists($filepath);
      if (!$download) {
        $stats = stat($filepath);
        $download = $stats['ctime'] < (time() - 86400);
      }
      if ($download) {
        $url = 'http://launchpad.net/ubuntu-drupal-theme/trademark/6.7.0/+download/'. $filename;
        $response = drupal_http_request($url);
        if ($response->code == 303) {
          //Handle 303 because drupal_http_request doesn't
          $response = drupal_http_request($response->headers['Location']);
        }
        if (isset($response->data)) {
          file_save_data($response->data, $filepath, FILE_EXISTS_REPLACE);
        }
        else {
          watchdog('udtheme', 'Unabled to download <a href="@url">@filename</a>: @code @status_message', array(
            '@url' => $url,
            '@filename' => $filename,
            '@code' => $response->code,
            '@status_message' => $response->status_message
          ), WATCHDOG_ERROR, $url);
        }
      }
    }
    return $filepath;
  }
}

/**
 * Renders the secondary links in a nice pretty way.
 */
function udtheme_secondary_menu($secondary_menu) {
  if (isset($secondary_menu)) {
    return theme(
      'links__system_secondary_menu',
      array(
        'links' => $secondary_menu,
        'attributes' => array(
          'id' => 'secondary-menu',
          'class' => array(
            'links',
            'inline',
            'clearfix',
          )
        ),
        'heading' => NULL
      )
    );
  }
  else {
    return NULL;
  }
}

/**
 * Sets the body-tag class attribute.
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function udtheme_body_class($left = '', $right = '') {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  elseif ($left != '' && $right == '') {
    $class = 'sidebar-left';
  }
  elseif ($left == '' && $right != '') {
    $class = 'sidebar-right';
  }

  if (isset($class)) {
    return ' class="'. $class .'"';
  }
}

/**
 * Add Google+ verify at homepage and WebmasterTool
 */
function udtheme_page_alter($page) {
   $element = array(
    '#type' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'href' => 'https://plus.google.com/+ubuntuit',
      'rel' => 'publisher',
    ),
  );

  $webmaster = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'google-site-verification',
      'content' => 'soeC23ZVtNyi1idChzdSdG-dEmyMqdfpjGY1rf_XqnQ',
    ),
  );

  // If it's homepage, we add the verify link 
  if (drupal_is_front_page()) {
    drupal_add_html_head($element, 'google_plus');
    drupal_add_html_head($webmaster, 'webmaster');
  }
}