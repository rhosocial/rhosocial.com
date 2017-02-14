# Windows Apache Virtual Hosts

> The following only mentioned the most basic configuration, please refer to the [Apache manual](http://httpd.apache.org/docs/2.4/) for more details.

## Sites

The following is the local development environment virtual host configuration parameters,
if it is currently a production environment, replace `rhosocial.com.local` with the real domain name.

Now you can add a virtual host configuration in the `extra\httpd-vhosts.conf` file,
the specific configuration can refer to the examples listed below.

You should specify at least the following domain names:

```
sso.rhosocial.com.local
reg.rhosocial.com.local
www.rhosocial.com.local
```

You must specify the `ServerName` directive in the above files with your own base domain.

The default local domain is `rhosocial.com.local` ([/common/config/base/baseDomain-local.php](https://github.com/rhosocial/rhosocial.com/blob/master/environments/dev/common/config/base/baseDomain-local.php)).

Next, you should specify an loop-back IP address for each domain name (`%WINDIR%\system32\drivers\etc\hosts`), like following

```
127.0.0.1 sso.rhosocial.com.local
127.0.0.1 reg.rhosocial.com.local
127.0.0.1 www.rhosocial.com.local
```

Finally, reload Apache, and open browser, try to visit the sites just added.

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

You can load `mod_ssl` in the `httpd.conf` file:

```
LoadModule ssl_module modules/mod_ssl.so
```

and add additional SSL configuration to the `extra\httpd-vhosts.conf` file.

```
Listen 443
```

Then, enable the SSL engine in the virtual host settings, specifying the location of the certificate, key, and CA certificate.
You can refer to the examples listed below.

## Example

### Normal

```
<VirtualHost *:80>
    ServerName www.rhosocial.com.local
    ServerAdmin webmaster@rhosocial.com
    DocumentRoot D:\server\www\www.rhosocial.com\web
    ErrorLog "logs/www.rhosocial.com.error.log"
    CustomLog "logs/www.rhosocial.com.custom.log" combined
</VirtualHost>
```

### SSL

```
<VirtualHost *:443>
    ServerName www.rhosocial.com
    ServerAdmin webmaster@rhosocial.com
    DocumentRoot D:\server\www\www.rhosocial.com\web
    ErrorLog "logs/www.rhosocial.com.error.log"
    CustomLog "logs/www.rhosocial.com.custom.log" combined
    SSLEngine on
    SSLCertificateKeyFile /where/the/key/is/located/www.rhosocial.com.key
    SSLCertificateFile /where/the/certificate/is/located/www.rhosocial.com.crt
    SSLCACertificateFile /where/the/certificate/is/located/ca.crt 
</VirtualHost>
```
