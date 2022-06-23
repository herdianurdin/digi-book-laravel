## About Project

![Screenshot](Screenshot.webp)

Publicly accessible online book website. This website is made as simple as possible, because this project is intended to practice implementing the design of a project. This application project is built using laravel 9 with [stisla template](https://github.com/stisla/stisla).

[View Demo](https://digi-book-laravel.herokuapp.com/)

### Database Structure

![Database Structure](db_structure.webp)

### Built With

[<img src='laravel.svg' width="100" />](https://laravel.com/)

## Getting Started

### Requirement

- php 8
- composer
- mysql or postgresql

### Installation
```sh
# Install dependency
composer install

# Configure .env
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
php artisan storage:link
```

## Usage

### Seed User Admin & Book Category

```sh
php artisan db:seed
```

### Run Project

```sh
php artisan serve
```

## License

Distributed under the MIT License. See [LICENSE](LICENSE) for more information.
