# icinga-adfs

External authentication backend for Icinga that uses SAML (ADFS)

##Requirements: mod_auth_mellon

##Installation: 
Guide assumes Debian-based Linux

Install mod_auth_mellon package
``apt-get install mod_auth_mellon ``
Create metadata for Icinga ServiceProvider with mellon_create_metadata.sh:
``mellon_create_metadata icinga2 https://icinga2.example.com/mellon``
Adjust parameters in index.php, adfs.conf
Place authentication.ini in /etc/icingaweb2/
``cp authentication /etc/icingaweb2/``
Place index.php in /var/www/html/login:
``cp index.php /var/www/html/login/``
Place adfs.conf in /etc/apache2/sites-enabled/
``cp adfs.conf /etc/apache2/sites-enabled/``
ADFS: Establish Relying Party Trust in ADFS
ADFS: Add following to SP metadata before: </SPSSODescriptor> tag
 ``<NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified</NameIDFormat>``

Exchange metadata with SAML (ADFS)
Place IdP metadata (obtained from ADFS) in /etc/apache2/mellon/idp-metadata.xml
Test Apache config:
``apachectl configtest``
Restart Apache after successful test
``systemctl restart apache2``