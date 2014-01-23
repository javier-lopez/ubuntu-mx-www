/* Home JS */

var stop_automatic_rotation = false;

var order = ["Desktop", "Supporto", "Comunita"];
var links = new Array();

links["Desktop"] = "/scopri-ubuntu";
links["Supporto"] = "/supporto";
links["Comunita"] = "/comunita";


/* Buttons */
button = "btn.png";
button_on = "btn_on.png";

/* Base img relative path */
img_path = "/sites/all/themes/light-drupal-theme/images/banner/";

/* Current active slide */
cur_active = "Desktop";

function change_active(new_active) {
	/* Change buttons active/normal for old and new active slide */
	jQuery("#" + cur_active + "btn").attr('src', img_path + button);
	cur_active = new_active;
	jQuery("#" + cur_active + "btn").attr('src', img_path + button_on);
	
	jQuery("#" + "banner_active").hide().attr('src', img_path + cur_active + ".png").fadeIn("slow");
  jQuery("#" + "banner_active").click(function() {
    window.location = links[cur_active];
  });
  if (!stop_automatic_rotation) {
    t = setTimeout("change_active_with_next()", 8000);
  } else {
    clearTimeout(t);
  }

}

function change_active_with_prev() {
	index = order.indexOf(cur_active);
	index -= 1;
	if (index < 0) {
		return;
	}
	change_active(order[index]);
}

function change_active_with_next() {
	index = order.indexOf(cur_active);
	index += 1;
	if (index >= order.length) {
    stop_automatic_rotation = true;
		return;
	}
	change_active(order[index]);
}
