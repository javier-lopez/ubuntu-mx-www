//function change_view (year)
//{
//  var yeardiv = document.getElementById (year);
//  var yearimg = document.getElementById ("img" + year);
//  if (yeardiv.style.display == "block") {
//    yearimg.src = "/sites/default/files/arrow_closed.png";
//    yeardiv.style.display = "none";
//  } else {
//    yeardiv.style.display = "block";
//    yearimg.src = "/sites/default/files/arrow_expanded.png";
//  }
//} 

function change_view (year)
{
  var yeardiv = jQuery("#" + year);
  var yearimg = jQuery("#img" + year);
  if (yeardiv.css('display') == 'block') {
    yearimg.attr('src', '/sites/default/files/arrow_closed.png');
    yeardiv.slideUp();
  } else {
    yeardiv.slideDown();
    yearimg.attr('src', '/sites/default/files/arrow_expanded.png');
  }
} 
