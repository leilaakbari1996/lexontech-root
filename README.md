# lexontech-root
lexontech-root

leila.akbari1996@gmail.com
To use other packages from the company, this package must be installed.
Getting Started
step1:
composer require lexontech/root:"dev-main"

step2:
bootstrap/providers.php

return [

...,

\Lexontech\Root\RootServiceProvider::class

]

step3:
php artisan vendor:publish --tag

step4:
set database settings in .env

step5:
php artisan migrate
