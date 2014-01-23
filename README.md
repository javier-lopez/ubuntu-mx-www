## About

This is the site running on [http://ubuntumexico.org/](http://ubuntumexico.org/), mostly it's a copy of [http://ubuntu-it.org](http://ubuntu-it.org) personalized for our needs and translated in Spanish, the original ubuntu theme can be fetched at:

- [https://code.launchpad.net/~ubuntu-it-www/ubuntu-it-www/www-repo](https://code.launchpad.net/~ubuntu-it-www/ubuntu-it-www/www-repo)

Thanks to the Ubuntu-it team for sharing its work, and thanks for helping in setting up our own version.

## Quick start

If you are interested in deploying this site (which may be the case if you are trying to setup a loco portal team) follow the next instructions:

Note: The deployment has been optimized to work on Ubuntu 12.04 servers

1. Ensure you've root permitions through sudo

2. Run the deployment script (and answer the root question):

   ```
   $ sh <(wget -qO- https://raw2.github.com/chilicuil/ubuntu-mx-www/master/deploy)
   ```

3. Finish the installation using a browser (follow the instructions displayed by the script):

   ```
   - choose the language (english,spanish)
   - add the db settings (the script will generate the required parameters)
   - create the admin credentials and finish the installation
   ```

4. Enable the Ubuntu theme:

   ```
   - Visit /appearance
   - Choose Ubuntu-it Drupal Theme
   ```

5. Create content
