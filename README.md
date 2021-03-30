# Jetstream + Socialite
Simple Login with Facebook and Google integration.
using Laravel 8 Jetstream + Laravel Socialite

![login screen](https://user-images.githubusercontent.com/7022294/112988075-00d4cc80-9196-11eb-8cb2-4542b2b27904.png)

## Requirements
- PHP >= 7.4
- Composer >= 2
- Nodejs >= 15.4.0
- NPM >= 7.0.15

## Installation
1. Pull this repository
1. On project folder, run command `composer install`
1. Copy .env.example to .env
1. You can set Google or Facebook `CLIENT_ID,CLIENT_SECRET,CALLBACK_URL`
1. On project folder, run `php artisan migrate`
1. On project folder, run `npm install && npm run dev`
1. After installation, run `php artisan serve`

## How To's
If you want only one integration just fill in the CLIENT_ID,CLIENT_SECRET,CALLBACK_URL for the service you prefer.
- [How to add Google Client ID ?](https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid)
- [How to add Facebook Client ID ?](https://developers.facebook.com/docs/facebook-login/web)

## License
This software is licensed under the [MIT license](https://opensource.org/licenses/MIT).
