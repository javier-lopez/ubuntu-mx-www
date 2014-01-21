/*
** This file contains function to enable and
** disable Accessibility stylesheet in ubuntu-it
*/

//ACCESSIBILITY_CSS_THEME_DIR = 'light-drupal-theme/styles';
//ACCESSIBILITY_CSS_FILE_NAME = 'accessibility.css' ;
ACCESSIBILITY_CSS_ABSPATH = ['http://ubuntu-it.org/sites/all/themes/light-drupal-theme/styles/accessibility.css'];
ACCESSIBILITY_COOKIE_VALUE_ON = 'on';
ACCESSIBILITY_COOKIE_VALUE_OFF = 'off';

// This function adds the accessibility css into the Head section
// and set the cookie value ON
function accessibility_set_on () {

  head = document.getElementsByTagName('head')[0];
  
  for (i = 0; i < ACCESSIBILITY_CSS_ABSPATH.length ; i++) {
    link = document.createElement('link');
    link.setAttribute('type','text/css');
    link.setAttribute('rel', 'stylesheet');
    link.setAttribute('media', 'screen');
    link.setAttribute('href', ACCESSIBILITY_CSS_ABSPATH[i]);
    head.appendChild(link);
  }
  set_cookie_accessibility( ACCESSIBILITY_COOKIE_VALUE_ON );
}

// This function removes the accessibility css from the Head section
// and set the cookie value OFF
function accessibility_set_off() {
  head = document.getElementsByTagName('head')[0];
  links = head.getElementsByTagName('link');
  links_to_remove = []
  for (i = 0 ; i < links.length ; i++) {
    link = links[i];
    if (link.getAttribute('type') == 'text/css') {
      for (j = 0 ; j < ACCESSIBILITY_CSS_ABSPATH.length ; j++) {
        if (link.getAttribute('href').indexOf(ACCESSIBILITY_CSS_ABSPATH[j]) >= 0 ) {
          links_to_remove.push(link);
        }
      }
    }
  }
  for (i = 0; i < links_to_remove.length; i++) {
    head.removeChild(links_to_remove[i]);
  }
  set_cookie_accessibility( ACCESSIBILITY_COOKIE_VALUE_OFF );
}


function accessibility_toggle () {
  value = get_cookie_accessibility();

  // If accessibility is ON, remove the css stylesheet
  if (value == ACCESSIBILITY_COOKIE_VALUE_ON)
    accessibility_set_off();
  else
    accessibility_set_on();
}

// The main function
function accessibility () {
    value = get_cookie_accessibility();

  // If accessibility is ON, add the css stylesheet
  if (value == ACCESSIBILITY_COOKIE_VALUE_ON)
    accessibility_set_on();
}
