# Common Configuration

This directory contains configuration information for all projects. 

## Directory Structure

    assetManager/
    authManager/
    base/
    bootstrap/
    db/
    formatter/
    i18n/
    log/
    mailer/
    mdManager/
    mongodb/
    redis/
    request/
    user/

If you think the above classification is not enough, you can add their own.

## Usage

### Modules

You can list the modules(config array) in the `./modules/modules.php` file and
then load this file in `main.php`.

### Components

You should write a separate configuration parameter for each component and load it.

### Other

If other parameters are more complex and may often be modified, you need to write
them separately in the file and load it.

### Locally

If some of parameters are only valid locally, or contain sensitive information,
you can write an additional parameter file in a file and load it, and add this
file name to the `.gitignore` file to prevent its contents from being submitted
to the repository.