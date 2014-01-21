$Id$

Launchpad/OpenID module for Drupal 6.x

[IMPORTANT] Installation Note:
 Be sure to place the launchpad module in the same folder as the openid
 module (modules/ or sites/xxx/modules/), and to give it a name that
 comes lexicographically after the openid module.  If you don't do this,
 the form_alter hooks will be called out of order, and you'll end up
 with unwanted openid fields in your login forms, and possibly other
 bad side-effects.

The openid launchpad module extends the original drupal openid module for drupal
6.x. On install it sets the modified openid parent module to restrict openid
access to launchpad and also provides the following features:

- Launchpad login block: use this in place of the standard login block
- /launchpad url item: use this to automatically initiate an openid transaction
  and redirect to launchpad (eg: for use with pre-auth)
- Option to prevent 'My Account' access to users: in 'User management > User
  settings'
- Option to prevent access to user/register and user/password: in 'User
  management > User settings'.  User's who login for the first time but who
  don't have an email returned by launchpad are still able to enter their email
  manually.
- Uses user's launchpad username for their drupal username when creating an
  account and automatically updates username and email from launchpad
  for each subsequent login (optional - set in 'User management > User
  settings').
- Allows switching between demo, staging and production launchpad servers.  Set
  this in the launchpad login block's configuration settings
- Hide the password/confirm fields on the user's profile page
- Hide the openid login field in the standard login form

On installation, this module sets the following defaults:
- 'My Account' page enabled
- user/register and user/password disabled
- username and email syncronisation on login enabled
- launchpad server is production

Additional recommended configuration:
- When you have added the launchpad login block, configure it to "Show on every
  page except..." 'user' and 'user/*'.  This is to avoid issues with the
  javascript added by the original openid module.
  
[IMPORTANT] Using launchpad as a single sign-on provider on your site

Any site can use launchpad as a single sign-on provider.  Users who do not have
a launchpad account when they first attempt to log in to your site will be
given the opportunity to create one.

By default, however, launchpad will only return a user's username.  This means
that drupal will not be able to automatically be able to create an account for
them - drupal requires an email address to create an account so users will need
to enter their email address manually on your site in order to complete the
login process.

It is possible to receive email addresses from launchpad as part of the login
process by registering your site's trust root.  To do that, please file a
question on the launchpad project telling us your site's trust root:

https://launchpad.net/launchpad/+addquestion
