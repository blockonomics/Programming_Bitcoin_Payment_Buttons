# Blockonomics Programming Payment Links/Buttons in Laravel

This demo shows how to program the Payment Button/Link API to dynamically change the order price and also learn how to pass extra data to the API calls. [Here](https://www.youtube.com/watch?v=-FYwR1RzjXY) is the youtube video describing the tutorial. 

## Reference API documentation
https://help.blockonomics.co/support/solutions/articles/33000255235-programming-payment-buttons-links

## Installing Guide

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
* Head to [this line](https://github.com/blockonomics/Programming_Bitcoin_Payment_Buttons/blob/master/app/Http/Controllers/HomeController.php#L67) and replace the `parent_uid` with your value. Note that `parent_uid` is the one which is appended in your payment link after `https://www.blockonomics.co/pay-url/`.
* Go to `OPTIONS` in the PAYMENT BUTTONS/URL tab on [this page](https://www.blockonomics.co/merchants). You need to setup the `ORDER HOOK URL` and `Redirection URL`.
* To test the code locally, follow instructions from [this](https://www.youtube.com/watch?v=6Ydk32avIgo) video and make sure to place the `<domain>/receive` as your order hook url and `<domain>/home` as redirection url. Here `<domain>` is the domain you get from reverse proxy (Ngrok/localtunnel).
* Make sure to save your changes!

</details>

<details>
<summary> The Last Line! </summary>

* `php artisan serve`

<p> Now you are all set to locally run the demo! </p>

</details>


## Troubleshooting

<details>
<summary> SSL Certification Error when trying to click on apply button </summary>
    
* Note that this error can be traced either inside php logs or by looking at network in inspection mode. 
* Please refer to [this link](https://stackoverflow.com/questions/29822686/curl-error-60-ssl-certificate-unable-to-get-local-issuer-certificate) to help you solve the issue.

</details>
