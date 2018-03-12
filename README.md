# Stock Share Purchase System

##Steps to start the project:
1. git clone https://github.com/DKrein/StockShare.git
2. mv .env.example .env
3. composer install
4. php artisan key:generate
5. Edit the .env with database information
6. php artisan migrate

##FAQ
1. For the message **The page has expired due to inactivity. Please refresh and try again.** Execute the command:
```
php artisan config:cache
```
















> Douglas Krein