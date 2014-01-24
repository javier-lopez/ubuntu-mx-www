// Common variabiles
COOKIE_DOMAIN = "msg.sh";
COOKIE_PREFIX = "ubuntumexico_custom_";
COOKIE_ACCESIBILITY_NAME = "accessibility";


// Start Cookie in browser functions
function set_cookie ( name, value, expires, path, domain, secure )
{
  name = COOKIE_PREFIX + name;
  var cookie_string = name + "=" + escape ( value );

  if ( expires ) {
    cookie_string += "; expires=" + expires.toGMTString();
  }
  else {
    var expires = new Date ( 2100, 1, 1); // never expires
    cookie_string += "; expires=" + expires.toGMTString();
  }

  if ( path )
        cookie_string += "; path=" + escape ( path );
  else
        cookie_string += "; path=" + escape ("/")

  if ( domain )
        cookie_string += "; domain=" + escape ( domain );
  else
//        cookie_string += "; domain=" + escape (location.host)
        cookie_string += "; domain=" + escape (COOKIE_DOMAIN);
  
  if ( secure )
        cookie_string += "; secure";
  document.cookie = cookie_string;
}

function delete_cookie ( cookie_name ) {
  cookie_name = COOKIE_PREFIX + cookie_name;
  var cookie_date = new Date ( );  // current date & time
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}

function get_cookie ( cookie_name ) {
  cookie_name = COOKIE_PREFIX + cookie_name;
  if (document.cookie.length>0)
    {
    c_start=document.cookie.indexOf(cookie_name + "=");
    if (c_start!=-1)
          { 
          c_start = c_start + cookie_name.length+1;
          c_end = document.cookie.indexOf(";", c_start);
          if (c_end == -1) c_end = document.cookie.length;
          return unescape(document.cookie.substring(c_start,c_end));
          } 
    }
    return null
}
// End Cookie in browser functions



// Accessibility
function set_cookie_accessibility (cookie_value) {
  cookie_name = COOKIE_ACCESIBILITY_NAME;
  set_cookie (cookie_name, cookie_value);
}

function get_cookie_accessibility () {
  cookie_name = COOKIE_ACCESIBILITY_NAME;
  return get_cookie (cookie_name);
}
