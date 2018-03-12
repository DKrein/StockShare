# Stock Share Purchase System

## Steps to start the project:
1. git clone https://github.com/DKrein/StockShare.git
2. mv .env.example .env
3. composer install
4. php artisan key:generate
5. Edit the .env with database information
6. php artisan migrate
7. php artisan serve

## FAQ
1. For the message **"The page has expired due to inactivity. Please refresh and try again."**, please execute the command:
- php artisan config:cache

2. When running phpunit if the message **"No tests executed!"** shows up, please execute the command:
- ./vendor/bin/phpunit
















> created by **Douglas Krein** 