# Install 
```bash
git clone https://github.com/Weder77/API_WANTED
composer install
```


#### Modify database connection info in the .env
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

#### Fill the database
```bash
php bin/console doctrine:fixtures:load
```
Use the monster.sql to fill the Monster table


# Start the API
```bash
php -S localhost:8000 -t public
```
#### The API is available at `localhost:8000/api`
