# laravel-ingredient-assement

### Clone Repo

- Clone the repository from 

```bash
git clone https://github.com/shabayekdes/laravel-ingredient-assement.git
```

### Installation

- Go to folder of project and install composer

```bash
cd laravel-ingredient-assement
composer install
cp .env.example .env
```

- Set database connection in .env file

```
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

- Run migrations command and seed database with fake data

```bash
php artisan migrate --seed
```

- Configure mail settings in .env file I prefere using MailTrap
  
```
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=a307efa3807d90
MAIL_PASSWORD=a7ad67e2d618c2
MAIL_ENCRYPTION=tls
```

- Run storage link artisan to see upload images

```bash
php artisan storage:link
```

- Run server with 

```bash
php artisan serve
```

- open your browser and click on http://127.0.0.1:8000/ and click on login page 

```
email: test@example.com
password: 12345678
```

- Run tests

```bash
php artisan test
```

### Installation via Docker

> make sure you install docker on local machine first 

- run with laravel sail

```bash
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan storage:link
```

- open your browser and click on http://127.0.0.1:8000/

- Run tests

```bash
./vendor/bin/sail artisan test
```
