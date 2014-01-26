<?php
// $Id$

/**
 * @file
 * Theme setting callbacks for the umxtheme
 */

/**
 * Implements hook_form_FORM_ID_alter().
 *
 * @param $form
 *   The form.
 * @param $form_state
 *   The form state.
 */
function umxtheme_form_system_theme_settings_alter(&$form, &$form_state) {
  require_once 'template.php';
  $ubuntu_footer_text = umxtheme_footer_text();

  $form['page'] = array(
    '#type'        => 'fieldset',
    '#title'       => t('Page Options'),
    '#collapsible' => TRUE,
    '#collapsed'   => FALSE,
    '#tree'        => FALSE,
  );
  $form['page']['page_maxwidth'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Page Maximum Width'),
    '#description'   => t('Maximum width of the page. This should be the maximum ideal width of the page.'),
    '#default_value' => theme_get_setting('page_maxwidth'),
    '#required'      => TRUE,
  );
  $form['page']['page_minwidth'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Page Minimum Width'),
    '#description'   => t('Minimum width of the page. The page is fluid between here and the maximum width. Leave empty if you want a static width.'),
    '#default_value' => theme_get_setting('page_minwidth'),
    '#required'      => FALSE,
  );
  $form['page']['render_search'] = array(
    '#type'    => 'radios',
    '#title'   => t('Render Search (in header)'),
    '#options' => array(
      '1'      => t('Yes'),
      '0'      => t('No'),
    ),
    '#description'   => t('Display the search box in the header of the page.'),
    '#default_value' => theme_get_setting('render_search'),
  );
  $form['page']['display_help'] = array(
    '#type'    => 'radios',
    '#title'   => t('Display Help'),
    '#options' => array(
      '1'      => t('Yes'),
      '0'      => t('No'),
    ),
    '#description'   => t('Display help above the content or not.'),
    '#default_value' => theme_get_setting('display_help'),
  );
  $form['page']['ubuntu_footer'] = array(
    '#type'    => 'radios',
    '#title'   => t('Ubuntu Community Footer'),
    '#options' => array(
      '1'      => t('Display'),
      '0'      => t('Hide'),
    ),
    '#description'   => t('Display the Ubuntu Community Footer, which includes blocks for the legal disclaimer and other Ubuntu community websites.'),
    '#default_value' => theme_get_setting('ubuntu_footer'),
  );

  $form['style'] = array(
    '#type'        => 'fieldset',
    '#title'       => t('Style Options'),
    '#collapsible' => TRUE,
    '#collapsed'   => FALSE,
    '#tree'        => FALSE,
  );
  $form['style']['umxtheme_style'] = array(
    '#type'           => 'radios',
    '#title'          => t('Ubuntu Style'),
    '#options'        => array(
      'classic-brown' => t('Classic Brown'),
      'ubuntu-2010'   => t('Official Ubuntu'),
      'kimis-pink'    => t('Kimi\'s Pink'),
      'majan-blue'    => t('Majan\'s Blue'),
    ),
    '#description'   => t('Select which color pallet to apply to the theme. Under the trademark policy (http://bit.ly/Hk4DA) only Ubuntu related projects may use the "Official Ubuntu" style. The rest is open to anyone. NOTE: Only the Classic Brown theme works, do NOT change it'),
    '#default_value' => theme_get_setting('umxtheme_style'),
  );
  $form['style']['umxtheme_trademark'] = array(
    '#type'    => 'radios',
    '#title'   => t('Ubuntu Community Styles'),
    '#options' => array(
      '0'      => t('Disabled'),
      '1'      => t('Enabled'),
    ),
    '#description'   => t('This will override the above style sheet. It is for use by Ubuntu related projects only. It uses external images which are trademarked. (http://bit.ly/Hk4DA), NOTE: Currently broken, do NOT enable it'),
    '#default_value' => theme_get_setting('umxtheme_trademark'),
  );

  // Return the additional form widgets
  return $form;
}
