# Relay Example Bundle

[GitLab](https://gitlab.tugraz.at/dbp/relay/dbp-relay-example-bundle) |
[Packagist](https://packagist.org/packages/dbp/relay-example-bundle)

The goal of this bundle is to include a wide variety of features that you might
need in developing your own bundle. So you can use it as either a reference, or
as a starting point/sandbox for experiments.

When including this bundle into your API server it will gain the following
features:

* A custom `./bin/console` command
* An example entity
* Various HTTP methods implemented for that entity
* A custom controller for that entity
* A health check
* ...

Integrate it into your server via:

```bash
composer require dbp/relay-example-bundle
```

## Development & Testing

* Install dependencies: `composer install`
* Run tests: `composer test`
* Run linters: `composer run lint`
* Run cs-fixer: `composer run cs-fix`
