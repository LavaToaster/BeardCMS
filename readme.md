BeardCMS
========

Laravel4 based CMS.

Installation
------------

Install composer dependencies
```
composer install
```

Generate Application Key
```
php artisan key:generate
```

Edit the config files as you need them, the two initially required are:
```
beardcms/config/app.php
beardcms/config/database.php
```

Migrate the database and packages (Warning: Make sure you migrate sentry first or the database seeding will fail!)
```
php artisan migrate --package=cartalyst/sentry
php artisan migrate --seed
```

You are done!