## Install 
git clone https://github.com/ariffnii/app_03_ukk.git

## Masuk Ke File
cd app_03_ukk

## Install Composer
composer install

## Install NPM
npm install

## Copy File di Terminal
copy .env.example .env

## Di .env
DB_DATABSE=db_03_ukk

## Generate Key
php artisan key:generate
php artisan storage:link 
php artisan migrate --seed

## Di Terminal 
php artisan serve

## Di Terminal yang berbeda
npm run dev
