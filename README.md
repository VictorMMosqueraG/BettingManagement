# Betting Management

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Betting Management

Betting Management is a web application built with Laravel that allows users to manage bets on sports events. The application includes features for creating, updating, and listing users and bets.

## Requirements

- PHP 8.0 or higher
- Composer
- Docker and Docker Compose
- Node.js and npm (for frontend assets)

## Installation

1. Clone the repository:

    ```sh
    git clone https://github.com/yourusername/betting-management.git
    cd betting-management
    ```

2. Copy the [.env.example](http://_vscodecontentref_/1) file to [.env](http://_vscodecontentref_/2) and configure your environment variables:

    ```sh
    cp .env.example .env
    ```

3. Install PHP dependencies:

    ```sh
    composer install
    ```

4. Install Node.js dependencies:

    ```sh
    npm install
    ```

5. Generate the application key:

    ```sh
    php artisan key:generate
    ```

6. Build frontend assets:

    ```sh
    npm run dev
    ```

## Docker Setup

1. Build and start the Docker containers:

    ```sh
    docker-compose up --build -d
    ```

2. Run database migrations:

    ```sh
    docker-compose exec app php artisan migrate
    ```

## Running Tests

To run the tests, use the following command:

```sh
vendor/bin/phpunit
