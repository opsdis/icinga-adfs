# icinga-adfs

External authentication backend for Icinga that uses SAML (ADFS)

## Requirements: mod_auth_mellon

## Installation: 
Guide assumes Debian-based Linux

1. Compile and install mod_auth_mellon package (https://github.com/Uninett/mod_auth_mellon/releases/tag/v0.14.2)

2. Create metadata for Icinga ServiceProvider with mellon_create_metadata.sh (https://icinga2.example.com/icinga2 is the SP IdentityID and full URL to MellonEndpointPath is used for https://icinga2.example.com/mellon):

> ``wget https://github.com/Uninett/mod_auth_mellon/blob/master/mellon_create_metadata.sh``

> ``chmod +x mellon_create_metadata.sh``

> ``mellon_create_metadata https://icinga2.example.com/icinga2 https://icinga2.example.com/mellon``

3. ADFS: Add following to SP metadata xml before the </SPSSODescriptor> tag

> ``<NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified</NameIDFormat>``

4. Adjust parameters in index.php, adfs.conf

5. Place authentication.ini in /etc/icingaweb2/

> ``cp authentication.ini /etc/icingaweb2/``

6. Place index.php in /var/www/html/login:

> ``mkdir  /var/www/html/login/ /var/www/html/locallogin/``

> ``cp index.php /var/www/html/login/index.php``

> ``cp locallogin.php /var/www/html/locallogin/index.php``

7. Place adfs.conf in /etc/apache2/sites-enabled/

> ``cp adfs.conf /etc/apache2/sites-enabled/``

8. Edit index.php and change group id that admins will be assigned to and database credentials under $mapping.

9. ADFS: Establish Relying Party Trust in ADFS

Add http://schemas_microsoft_com/ws/2008/06/identity/claims/role claim

Add a 'Transform an Incoming Claim' that transforms 'UPN' into 'Name ID' in a 'Transient Identifier' Name ID format

10. Exchange metadata with SAML (ADFS) Generated xml from mellon_create_metadata.sh to IdP and FederationMetadata.xml from IdP to you.

>> ADFS metadata path example: https://fs.example.com/federationmetadata/2007-06/FederationMetadata.xml

11. Place IdP metadata (obtained from ADFS) in /etc/apache2/mellon/idp-metadata.xml

12. Test Apache config:

> ``apachectl configtest``

13. Restart Apache after successful test

> ``systemctl restart apache2``


Reference: https://www.techsupportpk.com/2018/05/single-sign-on-apache-windows-adfs-rhel-centos.html