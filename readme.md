# GymŠpit Pg3 web project


Requirements
------------

PHP 7.4 or higher with Composer installed.

Database server (MySQL preferred) with a new database.


Installation
------------

1. Copy `app/config/local.neon.dist` to `app/config/local.neon` and change them according to your environment.

2. Make directories `temp/` and `log/` writable for the web server.

3. Install PHP dependencies using composer:

		composer install


Configuration
-------------

For PHP configuration options, see https://doc.nette.org/cs/3.0/configuring.

Scripts
-------

* List console commands:

		bin/console

* Generate a migration by comparing your current database to your mapping information:

		bin/console migrations:diff

* Execute migrations to the latest available version:

		bin/console migrations:migrate

* Check code style:

		composer check-cs

* Fix code style:

		composer fix-cs

* Run PHPStan:

		composer phpstan

* Run tests:

		composer test

* Run tests on Ubuntu:

		composer test -- -c tests/php-ubuntu.ini
