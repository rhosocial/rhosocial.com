# Development Environment

## Clone from repository

Please switch to the folder where you want to place the code repository, and then
execute the following command:

```
git clone https://github.com/rhosocial/rhosocial.com
```

The current branch is `master`, but we do not recommend that you commit the local
changes directly to the master branch.

You should create a new branch in the local, and then commit all the changes to
the new branch, and then push to the remote repository for code review, merge, etc,.

For example:

```
git branch <branch-name>
git checkout <branch-name>
```

The code does not include any dependency code packages, so you need to install all
dependencies before developing it.

## Install all dependencies.

Before installing the dependency packages, first make sure that:
The installation will overwrite all the files specified under the `enviroments`
folder. If you do not want to overwrite, you can modify the `post-install-cmd`
section of the composer.json file as the following way:

```
"post-install-cmd": "php init --env=Development --overwrite=n"
```

Then, please execute the following command to install all dependencies:

```
composer install
```

If you want to see the details of installation procedure, please attach the `-vvv`
parameter.

## Add to virtual hosts.



## Add local parameters.

### MySQL

### MongoDB

### Redis
