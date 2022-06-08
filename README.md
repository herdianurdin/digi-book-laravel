## About Project

![Screenshot](Screenshot.webp)

Publicly accessible online book website. This website is made as simple as possible, because this project is intended to practice implementing the design of a project.

### Database Structure

![Database Structure](db_structure.webp)

### Built With

[<img src='laravel.svg' width="100" />](https://laravel.com/)

## Getting Started

This application project was built using laravel 9.

### Prerequisites

```sh
sudo apt search php8.0-* 
```

### Installation
```sh
# Install dependency
composer install

# Configure .env
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh
```

## Usage

### Seed User Admin & Book Category

```sh
php artisan db:seed
```

### Seed Dummy Book

```sh
php artisan db:seed --class=DummyBookSeeder
```

### Run Project

```sh
php artisan serve
```

## License

Distributed under the MIT License. See [LICENSE](LICENSE) for more information.
