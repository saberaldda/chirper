<a href="https://github.com/saberaldda/chirper.git"> <h1 align="center">Chirper</h1></a>

## About

Laravel Chirper Full Stack App was developed based on Laravel Bootcamp, and it is based on Livewire for frontend.

## Tools & Libs I use in the Chirper
   - [PHP](https://www.php.net/)

   - [Laravel](https://laravel.com/)

   - [Livewire](https://livewire.laravel.com/docs)

   - [Laravel Volt](https://livewire.laravel.com/docs/volt)

   - [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)

   - [Laravel Socialite](https://laravel.com/docs/socialite)

   - [Laravel Sail](https://laravel.com/docs/sail)

   - [Docker](https://www.docker.com/)

   - [SQLite](https://www.sqlite.org/index.html)

   - [Tailwind CSS](https://tailwindcss.com/)

## Table of Contents

- [Docker installation](#prerequisites-with-docker)
  - [Prerequisites](#prerequisites-with-docker)
  - [installation](#installation-with-docker)

  OR

- [Local installation](#prerequisites-with-local)
  - [Prerequisites](#prerequisites-with-local)
  - [installation](#installation-with-local)

<br>
<hr>
<br>

# Prerequisites with Docker

For a installation with Docker, ensure that you have the following prerequisites installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Installation with Docker

> **Warning**
> Make sure to follow the requirements first.

Here is how you can run the project with Docker (Laravel Sail):
1. Clone this repo
    ```sh
    git clone https://github.com/saberaldda/chirper.git
    ```

1. Go into the project root directory
    ```sh
    cd chirper
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Install PHP dependencies with Laravel Sail
    ```sh
    ./vendor/bin/sail up
    ```
1. Create database `reports` (you can change database name)

1. Go to `.env` file 
    - set database credentials 
        ```sh 
        DB_DATABASE=chirper
        DB_USERNAME=root
        DB_PASSWORD=[YOUR PASSWORD]
        ```
    > Make sure to follow your database username and password

1. Generate key 
    ```sh
    ./vendor/bin/sail artisan key:generate
    ```

1. Run migrations & seeders
    ```
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail artisan db:seed
    ```

1. Visit [http://localhost](http://localhost) in your favorite browser.

<br>
<hr>
<br>

# Prerequisites with Local

For a local installation, ensure that you have the following prerequisites installed on your system:

- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)
- [npm](https://www.npmjs.com/get-npm)
- [SQLite](https://www.sqlite.org/download.html)

## Installation with Local

> **Warning**
> Make sure to follow the requirements first.

Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/saberaldda/chirper.git
    ```

1. Go into the project root directory
    ```sh
    cd chirper
    ```

1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `reports` (you can change database name)

1. Go to `.env` file 
    - set database credentials 
        ```sh 
        DB_DATABASE=chirper
        DB_USERNAME=root
        DB_PASSWORD=[YOUR PASSWORD]
        ```
    > Make sure to follow your database username and password

1. Install PHP dependencies 
    ```sh
    composer update
    ```
1. Generate key 
    ```sh
    php artisan key:generate
    ```

1. Run migrations & seeders
    ```
    php artisan migrate:fresh --seed
    ```
1. Run server 
   
    ```sh
    php artisan serve
    ```  

1. Visit [localhost:8000](http://localhost:8000) in your favorite browser.

    > Make sure to follow your Laravel local Development Environment.
