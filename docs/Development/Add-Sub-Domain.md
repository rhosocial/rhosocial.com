# Add new sub-domain (sub-project)

Take `my.rhosocial.com` as example:

## Add new directory

In the project root directory, create a new 'my.rhosocial.com' folder.
Then in the folder, you need to create the following folders:

    /assets               Asset Bundles.
    /config               Configuration.
    /controllers          Controllers.
    /messages             Messages.
    /models               Models.
    /runtime              Runtime generated files.
    /tests                All test cases.
    /views                Views
    /web                  Web-accessible folder

### Add Configuration

Before adding a configuration file, you need to create the `.gitignore` file and
add the files with suffix '-local' to avoid committing them to the repository.

You need to add at least the following eight configuration files:

    bootstrap.php         The settings to be used when the application starts.
    main-local.php        Main settings in local.
    main.php              Main settings.
    params-local.php      Parameters in local.
    params.php            Parameters.
    test-local.php        The settings for testing in local.
    test.php              The settings for testing.
    urlManager.php        The settings for the 'urlManager' component.

## Add namespace

Add namespace setting statement to the common bootstrap file, like following:

```php
Yii::setAlias('@my_rhosocial_com', dirname(dirname(__DIR__)) . '/my.rhosocial.com');
```

## Add translation

Please specify the category name in the `i18n` component in the `main.php` config file, like following:

```php
'i18n' => [
    'translations' => [
        'my*' => [
            'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@my_rhosocial_com/messages',
        ],
    ]
],
```

## Add assets, models, controllers, views, modules, components, widgets, etc

### Assets

## Add test cases

## Environments

If necessary, you need to prepare the 'development' and 'production' environment of the initialization files.

In the development environment, you need to prepare the following files and folders:

    /config
    ....main-local.php
    ....params-local.php
    ....test-local.php
    /web
    ....index-test.php
    ....index.php

In the production environment, you need to prepare the following files and folders:

    /config
    ....main-local.php
    ....params-local.php
    /web
    ....index.php

Then, you need to specify the directories which need to set writable permission:

```php
return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => [
            ...
            'my.rhosocial.com/runtime',
            'my.rhosocial.com/web/assets',
            ...
        ],
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => [
            ...
            'my.rhosocial.com/runtime',
            'my.rhosocial.com/web/assets',
            ...
        ],
    ],
];
```

After that, the above two directories will be set to "writable" when the `init` command is executed.
