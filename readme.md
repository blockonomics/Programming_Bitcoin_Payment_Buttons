# Blockonomics Programming Payment Links/Buttons in Laravel

This demo shows how to program the Payment Button/Link API to dynamically change the order price and also learn how to pass extra data to the API calls. [Here](https://www.youtube.com/watch?v=-FYwR1RzjXY) is the youtube video describing the tutorial. 

## Installing Guide


<details open>
<summary> Cloning Repository </summary>
 
```
git clone https://github.com/AJ-54/Blockonomics_Programming_Links.git
cd Blockonomics_Programming_Links
```
</details>

<details>
<summary> Installing dependencies </summary>

* `composer install`
* `npm install`
* `cp .env.example .env`
* `php artisan key:generate`
* By now, you have installed all the dependencies and also created copy of the .env file.

</details>

<details>
<summary> Setting up Environment Configurations </summary>

* In the .env file, add database information to allow Laravel to connect to the database, fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the local database you created. 
* Place your Blockonomics API Key in the `Blockonomics_API` field. This will allow us to run migrations in the next step.

</details>

<details>
<summary> Migration Code </summary>

* `php artisan migrate`
* `php artisan storage:link`

</details>


<details>
<summary> Blockonomics Website Setup </summary>

* Create your payment link from [here](https://www.blockonomics.co/merchants) by going to PAYMENT BUTTONS/URL tab.
* Head to [this line](https://github.com/AJ-54/Blockonomics_Programming_Links/blob/75a4f139d298cd43dfafe20525d9823a31e3a44b/app/Http/Controllers/HomeController.php#L67) and replace the `parent_uid` with your value. Note that `parent_uid` is the one which is appended in your payment link after `https://www.blockonomics.co/pay-url/`.
* Go to `OPTIONS` in the PAYMENT BUTTONS/URL tab on [this page](https://www.blockonomics.co/merchants#/page3). You need to setup the `ORDER HOOK URL` and `Redirection URL`.
* To test the code locally, follow instructions from [this](https://www.youtube.com/watch?v=6Ydk32avIgo) video and make sure to place the `<domain>/receive` as your order hook url and `<domain>/home` as redirection url. Here `<domain>` is the domain you get from reverse proxy (Ngrok/localtunnel).
* Please make sure you are using `http` and not `https`. Your domain would be in `https` but place `http` URL in the order hook url and redirection url. 
* Make sure to save your changes!

</details>

Now you are all set to locally run the demo!
