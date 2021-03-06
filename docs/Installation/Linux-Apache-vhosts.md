# Linux Apache Virtual Hosts

> The following only mentioned the most basic configuration, please refer to the [Apache manual](http://httpd.apache.org/docs/2.4/) for more details.

## Sites

The following is the local development environment virtual host configuration parameters,
if it is currently a production environment, replace `rhosocial.com.local` with the real domain name.

Now add the available sites under the Apache's `sites-available`(`/etc/apache2/sites-available`) folder:

```
sso.rhosocial.com.conf
reg.rhosocial.com.conf
www.rhosocial.com.conf
```

You must specify the `ServerName` directive in the above files with your own base domain.

The default local domain is `rhosocial.com.local` ([/common/config/base/baseDomain-local.php](https://github.com/rhosocial/rhosocial.com/blob/master/environments/dev/common/config/base/baseDomain-local.php)).

Next, you should specify an loop-back IP address for each domain name (`/etc/hosts`), like following

```
127.0.0.1 sso.rhosocial.com.local
127.0.0.1 reg.rhosocial.com.local
127.0.0.1 www.rhosocial.com.local
```

Then, please enable above sites:

```
a2ensite sso.rhosocial.com.conf
a2ensite reg.rhosocial.com.conf
a2ensite www.rhosocial.com.conf
```

> Note: Maybe you need the root privileges.

Finally, reload Apache, and open browser, try to visit the sites just enabled.

## SSL

### Preface

The browser considers that a valid certificate must be issued by a trusted certificate authority.

In the development phase, you can choose to use self-issued certificate,
and you can also use the certificate issued by a trusted authority.
In the production phase, you must use a certificate issued by a trusted authority.

Trusted certificate issuers generally do not issue certificates for forged domain names.
So, if you want to use a trusted certificate during development,
you may need to set the domain name of the hosts to the domain name corresponding to the certificate.

If you choose to use self-signed certificate, the browser will mark the certificate
is not credible, or even directly to prevent access.

In order not to affect brand promotion, but also want to use a trusted certificate,
you can apply for additional real domain name, and issue a certificate.

### Virtual Host

This feature requires SSL modules to be enabled:

```
a2enmod ssl
```

> This command may need root privileges, and restart Apache after enabling it.

Then, enable the SSL engine in the virtual host settings, specifying the location of the certificate, key, and CA certificate.
You can refer to the examples listed below.

## Example

### Normal

```
<VirtualHost *:80>
    ServerName www.rhosocial.com.local
    ServerAdmin webmaster@rhosocial.com
    DocumentRoot /var/www/www.rhosocial.com
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

### SSL

```
<VirtualHost *:443>
    ServerName www.rhosocial.com
    ServerAdmin webmaster@rhosocial.com
    DocumentRoot /var/www/www.rhosocial.com
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
    SSLEngine on
    SSLCertificateKeyFile /where/the/key/is/located/www.rhosocial.com.key
    SSLCertificateFile /where/the/certificate/is/located/www.rhosocial.com.crt
    SSLCACertificateFile /where/the/certificate/is/located/ca.crt 
</VirtualHost>
```
