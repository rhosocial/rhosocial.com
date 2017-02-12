# Apache Environment

> The following only mentioned the most basic configuration, please refer to the [Apache manual](http://httpd.apache.org/docs/2.4/) for more details.

## Sites

The following is the local development environment virtual host configuration parameters,
if it is currently a production environment, replace `rhosocial.com.local` with the real domain name.

Now add the available sites under the Apache's `sites-available`(`/etc/apache2/sites-available`) folder:

```
www.rhosocial.com.conf
sso.rhosocial.com.conf
```

You must specify the `ServerName` directive in the above files with your own base domain.

The default local domain is `rhosocial.com.local`.

Next, you should specify an loop-back IP address for each domain name (`/etc/hosts`), like following

```
127.0.0.1 www.rhosocial.com.local
127.0.0.1 sso.rhosocial.com local
```

Then, please enable above sites:

```
a2ensite www.rhosocial.com.conf
a2ensite sso.rhosocial.com.conf
```

> Note: Maybe you need the root privileges.

Finally, reload Apache, and open browser, try to visit the sites just enabled.

## SSL

The browser considers that a valid certificate must be issued by a trusted certificate authority.

In the development phase, you can choose to use self-issued certificate,
you can also use the certificate issued by a trusted authority.
In the production phase, you must use a certificate issued by a trusted authority.

Trusted certificate issuers generally do not issue certificates for forged domain names.
So, if you want to use a trusted certificate during development,
you may need to set the domain name of the hosts to the domain name corresponding to the certificate.

If you choose to use self-signed certificate, the browser will mark the certificate
is not credible, or even directly to prevent access.

## Example

```
<VirtualHost *:80>
    ServerName www.rhosocial.com.local
    ServerAdmin webmaster@rhosocial.com
    DocumentRoot /var/www/www.rhosocial.com
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
