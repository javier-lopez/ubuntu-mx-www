/* This files contains functions for panel pages */

PANELS_BOX_TOP_CLASS = 'box-top';
PANELS_BOX_BOTTOM_CLASS = 'box-bottom';

// This function adds the box-top-added divs
function panels_add_top_boxes() {

  //var tops = document.getElementsByClassName(PANELS_BOX_TOP_CLASS);
  var tops = jQuery("." + PANELS_BOX_TOP_CLASS);
  
  for (i = 0 ; i < tops.length ; i ++) {
    var div_top = document.createElement('div');
    div_top.className = PANELS_BOX_TOP_CLASS + '-added';
    var parent = tops[i].parentElement;
    if (parent == null)
      parent = tops[i].parentNode;
    parent.insertBefore(div_top, tops[i]);
  }
}

// This function adds the box-bottom-added divs
function panels_add_bottom_boxes() {

  //var bottoms = document.getElementsByClassName(PANELS_BOX_BOTTOM_CLASS);
  var bottoms = jQuery("." + PANELS_BOX_BOTTOM_CLASS);
  
  for (i = 0 ; i < bottoms.length ; i ++) {
    var div_bottom = document.createElement('div');
    div_bottom.className = PANELS_BOX_BOTTOM_CLASS + '-added';
    var parent = null;
    var parent = bottoms[i].parentElement;
    if (parent == null)
      parent = bottoms[i].parentNode;
    parent.insertBefore(div_bottom, bottoms[i].nextSibling);
  }
}

// This functions changes the style of some elements
// that we don't want to show in a panel page
// TODO: put this instrunctions in a custum-panels.css
function panels_hidden_elements() {
    
      // #content-top
      document.getElementById('content-top').style.display = 'none';

      // #content-bottom
      document.getElementById('content-bottom').style.display = 'none';
      
      // #content .container
      jQuery("#content .container")[0].style.background = 'transparent';
      try {
      // #content node
      jQuery("#content .node")[0].style.padding = '0px 2px 8px 2px';
      } catch (e) {
        try {
          jQuery("#panels-edit-display-form div")[0].style.padding = '4px 2px 8px 2px';
          document.getElementById('panels-dnd-main').style.padding = '0px 2px 8px 2px';
        } catch (e) {}
      }
      // #center
      document.getElementById('center').style.padding = '0px';
      document.getElementById('center').style.margin = '0px';
}

// This function is used to make slideshow in Scopri Ubuntu > Desktop page
SOPRI_UBUNTU_PANEL_ID = "#su-desktop";
function scopriubuntu_desktop() {
  SU_DESKTOP = SOPRI_UBUNTU_PANEL_ID + " ";
  titles = jQuery(SU_DESKTOP + "h1.slidetitle");
  for (i = 0 ; i < titles.length ; i++) {
    jQuery(SU_DESKTOP + "#menu_navigator ul").append(jQuery('<li></li>').html(titles[i].innerHTML));
  }
  
  jQuery(jQuery(SU_DESKTOP + "#menu_navigator ul li")[0]).addClass('active');

  jQuery(SU_DESKTOP + ".slideshow").scrollable({
  	// up/down keys will always control this scrollable
	  keyboard: 'static',
	  circular: true,
  }).navigator(SU_DESKTOP + "#menu_navigator ul").autoscroll(10000);
}


// Main function
function panels() {
  if ( jQuery("."+PANELS_BOX_TOP_CLASS).length > 0) {
      //document.getElementsByClassName(PANELS_BOX_TOP_CLASS).length > 0) { // It's a panel to modify
      panels_hidden_elements();
      panels_add_top_boxes();
      panels_add_bottom_boxes();
      
      if(jQuery(SOPRI_UBUNTU_PANEL_ID).length > 0) {
        scopriubuntu_desktop();
      }
  }
}
