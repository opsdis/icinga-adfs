# icinga-adfs

External authentication backend for Icinga that uses SAML (ADFS)

##Requirements: mod_auth_mellon

##Installation: 
Guide assumes Debian-based Linux

1. Install mod_auth_mellon package
> ``apt-get install mod_auth_mellon ``

2. Create metadata for Icinga ServiceProvider with mellon_create_metadata.sh:
> ``mellon_create_metadata icinga2 https://icinga2.example.com/mellon``

3. Adjust parameters in index.php, adfs.conf

4. Place authentication.ini in /etc/icingaweb2/
> ``cp authentication /etc/icingaweb2/``

5. Place index.php in /var/www/html/login:
> ``cp index.php /var/www/html/login/``

6. Place adfs.conf in /etc/apache2/sites-enabled/
> ``cp adfs.conf /etc/apache2/sites-enabled/``

7. ADFS: Establish Relying Party Trust in ADFS

8. ADFS: Add following to SP metadata before: </SPSSODescriptor> tag
> ``<NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified</NameIDFormat>``

9. Exchange metadata with SAML (ADFS)

10. Place IdP metadata (obtained from ADFS) in /etc/apache2/mellon/idp-metadata.xml

11. Test Apache config:
> ``apachectl configtest``

12. Restart Apache after successful test
> ``systemctl restart apache2``