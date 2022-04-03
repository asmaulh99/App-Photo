
### API Photo ###

This Rest API requires [Laravel](https://laravel.com/) to run. and using Mysql as database
First fill the .env file
```sh
cp .env.example .env
```

Fill the .env
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yourdatabase
DB_USERNAME=yourusername
DB_PASSWORD=yourpassword

```
Install the dependencies , run migration and seeder.

```sh
composer install
php artisan migrate --seed
```

For running this API you can use PM2 with this command
php artisan serve

For the documentation API Endpoint you can go to this link [Photo API](https://www.postman.com/telecoms-specialist-49995159/workspace/photo-api)
