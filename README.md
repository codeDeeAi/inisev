## About Inisev Subscription

Simple subscription application for multi tenants

## Features

- Create a Tenants.
- Users can subscribe to multiple tenants.
- Tenants can create posts.
- New Posts get Emailed directly to users.
- Send email to users via command line

## Installation

- Clone repository.
- Run ``composer install``
- Create ``.env`` file and connect database credentials ``DB_DATABASE`` , ``DB_USERNAME`` , ``DB_PASSWORD``.
- Enable Database queue ``QUEUE_CONNECTION=database`` in ``.env``.
- Enable mail credentials in ``.env``.
- Run ``php artisan migrate`` and ``php artisan db:seed`` to seed database
- To send email via command line use ``php artisan email:users {tenant_id} {title} {post}``

## API Docuentation
https://documenter.getpostman.com/view/15372560/UzBiNTWc

## License

The Subscription [MIT license](https://opensource.org/licenses/MIT).
