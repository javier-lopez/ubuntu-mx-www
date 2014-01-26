## About

This is the bundle running at [http://ubuntumexico.org/](http://ubuntumexico.org/), based on the [http://ubuntu-it.org](http://ubuntu-it.org) site personalized for our needs and translated to Spanish, the original ubuntu theme can be fetched at:

- [https://code.launchpad.net/~ubuntu-it-www/ubuntu-it-www/www-repo](https://code.launchpad.net/~ubuntu-it-www/ubuntu-it-www/www-repo)

Thanks to the Ubuntu-it team for sharing its work, and for helping in setting up our own version.

## Quick start

### Vps

Note: The deployment has been optimized to work on Ubuntu 12.04 servers

1. Ensure you've root permissions through sudo

2. Run the deployment script (and answer the root question):

   ```
   $ sh <(wget -qO- https://raw2.github.com/chilicuil/ubuntu-mx-www/master/deploy)
   ```

3. Save the generated db settings

### Cpanel

1. Create a db, and a user to use it with

2. Copy the content of www to your public_html directory

### General

1. Finish the installation browsing to your external server ip:

   ```
   - select the Ubuntu-mx profile
   - insert the db settings
   - create the admin credentials
   ```

2. Create content

## Documentation

A general wrap-up of the distribution can be review at:

- [http://javier.io/blog/en/2014/01/26/introduction-to-drupal-7-installation-profiles.html](http://javier.io/blog/en/2014/01/26/introduction-to-drupal-7-installation-profiles.html)
