# Production Environment

## Clone from repository

Please switch to the folder where you want to place the code repository, and then
execute the following command:

```
git clone https://github.com/rhosocial/rhosocial.com
```

The code does not include any dependency code packages, so you need to install all
dependencies before developing it.

## Install all dependencies.

The installation process defaults to setting the runtime environment to "development"
instead of "production", so you need to modify the contents of the "post-install-cmd"
section of `composer.json` before performing the installation, for example:

```
"post-install-cmd": "php init --env=Production --overwrite=y"
```

Then, please execute the following command to install all dependencies:

```
composer install --no-dev --no-interaction
```

If you want to see the details of installation procedure, please attach the `-vvv` parameter.

The code package already contains the `composer.lock`, which contains the source of all dependency packages.
After you execute the above command, all the dependency packages are downloaded directly from its specified source.

## Add to virtual hosts.

Take Apache 2.4 as an example: [Windows](Windows-Apache-vhosts.md) | [Linux](Linux-Apache-vhosts.md)

## Add local parameters.

All local-only parameters should be written in a file with a suffix of '-local.php',
and add them into ignorance list.
This is done to prevent local parameters (including sensitive information) from
affecting the contents of the repository.

### Cookie Validation Key

The cookie validation key has been generated during installation. 
If you want to modify it, please do not modify the `request.php`, but modify the
`request-local.php`, and the new string length can not be less than 32.

### MySQL

### MongoDB

### Redis
