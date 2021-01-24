# Blockonomics Programming Payment Links/Buttons

This demo shows how to program the Payment Button/Link API to dynamically change the order price and also learn how to pass extra data to the API calls.  

## Installing Guide

```
git clone https://github.com/AJ-54/Blockonomics_Programming_Links.git
cd Blockonomics_Programming_Links
composer install
npm install
cp .env.example .env
php artisan key:generate
```

By now, you have installed all the dependencies and also created copy of the .env file. In the .env file, add database information to allow Laravel to connect to the database, fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. Also, place your Blockonomics API Key in the `Blockonomics_API` field. This will allow us to run migrations in the next step.

```
php artisan migrate
php artisan storage:link
php artisan serve
```

Now you are all set to locally run the demo!
