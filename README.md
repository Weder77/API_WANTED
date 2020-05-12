# Install 
```bash
git clone https://github.com/Weder77/API_WANTED
composer install
```


#### Modify database connection info in the .env
```bash
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```


# Start the API
```bash
php -S localhost:8000 -t public
```
#### The API is available at `localhost:8000/api`
