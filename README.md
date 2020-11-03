# DBP API Starter Bundle

This Symfony bundle can be used as a template for creating new bundles for the
DBP API project.

When including this bundle into your DBP API server it will gain the following
features:

* A custom `./bin/console` command
* An example entity
* Various HTTP methods implemented for that entity

## Using the Bundle as a Template

* Copy the repo contents
* Adjust the project name in `composer.json`
* Invent a new PHP namespace and adjust it in all PHP files
* Rename `src/DbpStarterBundle` and `DependencyInjection/DbpStarterExtension` to match the new project name

## Integration into the API Server

* Add the repository to your composer.json:

```json
    "repositories": [
        {
            "type": "vcs",
            "url": "git@gitlab.tugraz.at:dbp/middleware/dbp-api/api-starter-bundle.git"
        }
    ],
```

* Add the package to as a dependency:

```json
    "require": {
        ...
        "dbp/api-starter-bundle": "@dev",
        ...
    },
```

* Add the bundle to your `config/bundles.php`:

```php
...
DBP\API\StarterBundle\DbpStarterBundle::class => ['all' => true],
DBP\API\CoreBundle\DbpCoreBundle::class => ['all' => true],
];
```

## Development & Testing

* Install dependencies: `composer install`
* Run tests: `composer test`
* Run linters: `composer run lint`
* Run cs-fixer: `composer run cs-fix`