# icinga-adfs

External authentication backend for Icinga that uses SAML (ADFS)

Users with Admin role claim from ADFS will be assigned to group 1 in Icinga

Limitation: No other roles will be automatically be applied. Group ID must be numeric.

##Requirements: mod_auth_mellon

##Installation: 
Guide assumes Debian-based Linux

1. Install mod_auth_mellon package
> ``apt-get install mod_auth_mellon``

2. Create metadata for Icinga ServiceProvider with mellon_create_metadata.sh (https://icinga2.example.com/icinga2 is the SP IdentityID and full URL to MellonEndpointPath is used for https://icinga2.example.com/mellon):
> ``mellon_create_metadata https://icinga2.example.com/icinga2 https://icinga2.example.com/mellon``

3. Adjust parameters in index.php, adfs.conf

4. Place authentication.ini in /etc/icingaweb2/
> ``cp authentication /etc/icingaweb2/``

5. Place index.php in /var/www/html/login:
> ``cp index.php /var/www/html/login/``

6. Place adfs.conf in /etc/apache2/sites-enabled/
> ``cp adfs.conf /etc/apache2/sites-enabled/``

7. Edit index.php and change group id that admins will be assigned to and database credentials

8. ADFS: Establish Relying Party Trust in ADFS
Add http://schemas_microsoft_com/ws/2008/06/identity/claims/role claim

9. ADFS: Add following to SP metadata before: </SPSSODescriptor> tag
> ``<NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified</NameIDFormat>``

10. Exchange metadata with SAML (ADFS) Generated xml from mellon_create_metadata.sh to IdP and FederationMetadata.xml from IdP to you.
>> ADFS metadata path example: https://fs.example.com/federationmetadata/2007-06/FederationMetadata.xml

11. Place IdP metadata (obtained from ADFS) in /etc/apache2/mellon/idp-metadata.xml

12. Test Apache config:
> ``apachectl configtest``

13. Restart Apache after successful test
> ``systemctl restart apache2``


Reference: https://www.techsupportpk.com/2018/05/single-sign-on-apache-windows-adfs-rhel-centos.html