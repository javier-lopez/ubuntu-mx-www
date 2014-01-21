// This file contains the main procedures

// is this the homepage? default: false
var is_home = false;
var t;

// Funzione super figherrima per i primi giorni del sito
function home_figherrima() {
    BANNER_DELAY = 250;
    DEFAULT_DELAY = 2500;
    FADEIN = 1500;
    jQuery("body").css('min-height', jQuery("#content").css('height'));
    jQuery("#header").hide();
    jQuery(".banner").hide();
    jQuery(".box-content").hide();
    jQuery(".box-top-added").hide();
    jQuery(".box-bottom-added").hide();
    jQuery("#footer").hide();
    
    jQuery(".banner").delay(BANNER_DELAY).fadeIn(FADEIN);
    jQuery("#header").delay(DEFAULT_DELAY).fadeIn(FADEIN);
    jQuery(".box-content").delay(DEFAULT_DELAY).fadeIn(FADEIN);
    jQuery(".box-top-added").delay(DEFAULT_DELAY).fadeIn(FADEIN);
    jQuery(".box-bottom-added").delay(DEFAULT_DELAY).fadeIn(FADEIN);
    jQuery("#footer").delay(DEFAULT_DELAY).fadeIn(FADEIN);
}


// funzione per posizionare il footer sempre in basso
function positonFooter() {
  if (jQuery(window).height() > jQuery('body').height())
  {
    var extra = jQuery(window).height() - jQuery('body').height();
    jQuery('#footer').css('margin-top', extra);
  }
}

function main() {

  // Path redirect :( 
  if (location.href.indexOf('/index.php?page=') >= 0) {
    location.href = location.href.replace('index.php?page=','')
  }

  if (location.pathname == '/' || location.pathname == '' || location.pathname == '/index.php') {
    is_home = true;
    t = setTimeout("change_active_with_next()", 8000);
  }
  // Se siamo nella homepage...
  //if (location.pathname == '/' || location.pathname == '' || location.pathname == '/index.php')
  //  home_figherrima();

  // Posizione il footer in basso
  positonFooter();
}
