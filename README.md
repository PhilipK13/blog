<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to run

This application was built using the laravel framework on Windows 10. 
To run this application, you need to have the following installed on your machine:

- WSL2 (Windows Subsystem for Linux) - [Installation Guide](https://docs.microsoft.com/en-us/windows/wsl/install-win10)
- Docker Desktop - [Installation Guide](https://docs.docker.com/docker-for-windows/install/)

(This should work on any OS that supports WSL2 and Docker Desktop, but has only been tested on Windows 10)

Once you have the above installed, you can follow the steps below to run the application:

1. Clone the repository to your local machine
2. Open a terminal and startup WSL2
3. Navigate to the root directory where you want to store the project
4. Run the following command to clone the repository:
    ```bash
    git clone https://github.com/PhilipK13/blog
    ```
5. Navigate to the project directory
6. Run the following command to start the application and get sail setup in the root directory:
    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php82-composer:latest \
        composer install --ignore-platform-reqs
    ```
7. You'll want to create a .env file in the root directory. You can run this command to do that.
    ```bash
    cp .env.example .env
    ```
8. Run the following command to startup the application:
    ```bash
    ./vendor/bin/sail up
    ```
9. Run the following command to generate an app key:
    ```bash
        ./vendor/bin/sail php artisan key:generate
    ```
10. Run the following command to setup the npm dependencies:
    ```bash
    ./vendor/bin/sail npm install
    ```
12. Run the following command to start vite and allow hot reloading:
    ```bash
        ./vendor/bin/sail npm run dev
    ```
13. You're all set! You can now access the application at http://localhost
14. You can also access the local mailpit instance at http://localhost:8025

If there are any issues feel free to reach out to me.

You can also reference Laravels extensive documentation [here](https://laravel.com/docs/10.x/sail)








