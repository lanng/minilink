# Minilink

Minilink is a URL shortener web application built with Laravel and Breeze for authentication. This project allows users
to shorten long URLs and manage them easily.

## Features

- URL shortening
- User authentication (login, register, password reset) with Laravel Breeze
- Dashboard for managing URLs
- Analytics for URL clicks

## Requirements

- PHP 8.0 or higher
- Composer
- Laravel 8.x or higher
- Node.js and NPM (without Laravel Sail)
- Docker (for Laravel Sail)

## Installation (with Laravel Sail)

1. Clone the repository:

    ```bash
    git clone https://github.com/lanng/minilink.git
    cd minilink
    ```

2. Run docker script to install all dependencies with Sail:

    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```

3. Start the Docker containers:

    ```bash
    ./vendor/bin/sail up -d
    ```

4. Set up the database and run migrations:

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

5. Build the front-end assets:

    ```bash
    ./vendor/bin/sail npm run dev
    ```

6. Start the development server (if not already running):

    ```bash
    ./vendor/bin/sail up -d
    ```

## Installation (without docker)

1. Clone the repository:

    ```bash
    git clone https://github.com/lanng/minilink.git
    cd minilink
    ```

2. Install the dependencies:

    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

4. Generate the application key:

    ```bash
    php artisan key:generate
    ```

5. Set up the database and run migrations:

    ```bash
    php artisan migrate
    ```

6. Build the front-end assets:

    ```bash
    npm run dev
    ```

7. Start the development server:

    ```bash
    php artisan serve
    ```

## Usage

1. Register a new account or log in with existing credentials.
2. Use the dashboard to shorten a new URL.
3. Manage your shortened URLs and view analytics.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Acknowledgments

- [Laravel](https://laravel.com/)
- [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#breeze)
- [Laravel Sail](https://laravel.com/docs/11.x/sail)

