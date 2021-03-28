# Ứng dụng web quản lý công việc

# Installation Guid

### Prerequisite
**Install PHP 7.4**
```bash
sudo apt install php7.4 php7.4-{fpm,tidy,gd,intl,mysql,odbc,opcache,soap,dev,curl,bz2,bcmath,json,mbstring,xml,zip} php-redis
```

### Install phpredis for session driver
Redis is using for sharing session driver

### Install dependencies
Fresh install
```bash
composer install
```

If you were working on the project before, please update with
```bash
composer update nothing
```
- Config .env file

```brash
# create file .env
cp .env.example .env
```
```brash
php artisan key:generate
```

- Update .env file and run
```bash
php artisan config:clear
php artisan migrate
php artisan route:cache
```
- To compile asset (CSS/JS), run following commands
```bash
# install npm 
npm install

# For development
npm run watch

# For production
npm run build
```

### Development

Laravel uses storage folder for some caching, run these commands for fixing storage permission
```bash
sudo chown -R $USER:www-data storage
sudo chmod -R 775 storage
```
### Run seed
```bash
php artisan db:seed --class=RoleSeed
php artisan db:seed --class=UserAdminSeed
php artisan permissions:refresh
```

### Run project
```bash
php artisan server
```
