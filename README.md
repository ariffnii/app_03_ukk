## Install 
git clone https://github.com/ariffnii/app_03_ukk.git
cd app_03_ukk
composer install
npm install
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
