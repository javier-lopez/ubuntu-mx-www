//function HideDiv(ID){
//    what = document.getElementById(ID);
//    if (what != null)
//        what.style.display="none";
//}

//function ShowDiv(ID){
//    what = document.getElementById(ID);
//    if (what != null)
//        what.style.display="block";
//}


function ShowDiv(ID) {
    jQuery("#comunita_slides").show();
    jQuery("#" + ID).fadeIn('normal');
//    jQuery("#" + ID).slideDown('normal');
    location.hash = 'group'; // anchor #group
}

function HideDiv(ID) {
    jQuery("#" + ID).hide();
//    jQuery("#" + ID).fadeOut('fast');
//    jQuery("#" + ID).slideUp('fast');
}


function ShowHideDiv(ID){
    what = document.getElementById(ID);
    if ((what != null) && (what.style.display != "block")){
        HideAll();
        ShowDiv(ID);
    }
} 

function HideAll(){
    HideDiv("web");
    HideDiv("doc");
    HideDiv("forum");
    HideDiv("irc");
    HideDiv("trad");
    HideDiv("dev");
    HideDiv("promo");
    HideDiv("ml");
    HideDiv("test");
    HideDiv("consiglio")
    HideDiv("fcm")
    HideDiv("stampa")
} 
