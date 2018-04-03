<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Real time chat

This a real time chat application on laravel PHP framework based on pusher broadcaster

INSTALLATION
------------

### Install project dependencies via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can set up this project using the following command:

~~~
composer up
~~~

### Install node modules

If you do not have [Node.js](https://nodejs.org/), you may install it [here](https://nodejs.org/en/download/).

Type following command:

~~~
npm install
~~~

### Migrate data base

Type following command:

~~~
php artisan migrate
~~~

### Config .env file

In order for this project to work, you must configure the .env file, or rather its specific sections:

~~~
DB_CONNECTION=<mysql>
DB_HOST=<host>
DB_PORT=<port>
DB_DATABASE=<name>
DB_USERNAME=<username>
DB_PASSWORD=<password>

-------------------------

BROADCAST_DRIVER=pusher

-------------------------

PUSHER_APP_ID=******
PUSHER_APP_KEY=*******************
PUSHER_APP_SECRET=********************
PUSHER_APP_CLUSTER=<cluster>
~~~
