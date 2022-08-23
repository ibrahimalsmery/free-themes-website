
# copy .env.example content into .env file 

cp .env.example .env

# set database name in .env file 

# install packges 

composer install 

# Generate your application encryption key 

php artisan key:generate

# Create database schema and data

php artisan migrate --seed

# Create Storage link 

php artisan storage:link

# Run server 

php artisan serve





