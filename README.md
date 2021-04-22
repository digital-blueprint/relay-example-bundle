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

* Add the bundle package as a dependency:

```
composer require dbp/api-starter-bundle=dev-main
```

* Add the bundle to your `config/bundles.php`:

```php
...
DBP\API\StarterBundle\DbpStarterBundle::class => ['all' => true],
DBP\API\CoreBundle\DbpCoreBundle::class => ['all' => true],
];
```

* Run `composer install` to clear caches

## Configuration

The bundle has a `secret_token` configuration value that you can specify in your
app, either by hardcoding it, or by referencing an environment variable.

For this create `config/packages/dbp_starter.yaml` in the app with the following
content:

```yaml
dbp_starter:
  secret_token: 42
  # secret_token: '%env(SECRET_TOKEN)%'
```

The value gets read in `DbpStarterExtension` and passed when creating the
`MyCustomService` service.

For more info on bundle configuration see
https://symfony.com/doc/current/bundles/configuration.html

## Development & Testing

* Install dependencies: `composer install`
* Run tests: `composer test`
* Run linters: `composer run lint`
* Run cs-fixer: `composer run cs-fix`

## Bundle dependencies

Don't forget you need to pull down your dependencies in your main application if you are installing packages in a bundle.

```bash
# updates and installs dependencies from dbp/api-starter-bundle
composer update dbp/api-starter-bundle
```
