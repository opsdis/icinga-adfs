# icinga-adfs

External authentication backend for Icinga that uses SAML (ADFS)

##Requirements: mod_auth_mellon

##Installation: 
Guide assumes Debian-based Linux

Create metadata for Icinga ServiceProvider with mellon_create_metadata.sh:
####mellon_create_metadata icinga2 https://icinga2.example.com/mellon
Install mod_auth_mellon package
Adjust parameters in index.php, adfs.conf
Place authentication.ini in /etc/icingaweb2/
Place index.php in /var/www/html/
Place adfs.conf in /etc/apache2/sites-enabled/
ADFS: Establish Relying Party Trust in ADFS
Exchange metadata
Place IdP metadata (obtained from ADFS) in /etc/apache2/mellon/idp-metadata.xml