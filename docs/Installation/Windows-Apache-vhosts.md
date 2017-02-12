# Windows Apache Virtual Hosts

> The following only mentioned the most basic configuration, please refer to the [Apache manual](http://httpd.apache.org/docs/2.4/) for more details.

## Sites

## SSL

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

## Example
