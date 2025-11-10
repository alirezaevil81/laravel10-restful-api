# laravel10-restful-api

This repository is a Laravel 10 starter project prepared for building a RESTful API. Below you'll find information about setup, usage, API endpoints, and development notes.

## Table of Contents
- Overview
- Technologies
- Requirements
- Local Installation
- Environment Configuration
- Running the Application
- Running Tests
- API Documentation (endpoints)
- Authentication
- Project Structure
- Troubleshooting & Tips
- Contributing
- License

## Overview
This project provides a basic template for creating RESTful APIs with Laravel 10. It includes initial structure and common configurations (for example, Sanctum for authentication, testing tools, and developer utilities) so you can quickly build web services.

## Technologies
- PHP ^8.1
- Laravel ^10.10
- Laravel Sanctum for API authentication
- GuzzleHTTP for HTTP requests
- PHPUnit for testing

(See `composer.json` for full dependency details.)

## Requirements
- PHP 8.1 or newer
- Composer
- (Optional) Node.js and npm/yarn for front-end assets and Vite
- SQLite or a database server such as MySQL/Postgres

## Local Installation
1. Clone the repository:

```bash
git clone <repository-url> laravel10-restful-api
cd laravel10-restful-api
```

2. Install PHP dependencies:

```bash
composer install
```

3. Create the environment file and generate the application key:

```bash
copy .env.example .env  # on Windows (cmd.exe)
php artisan key:generate
```

4. Database configuration
- If you plan to use SQLite, a `database/database.sqlite` file is included. For SQLite, set the DB settings in `.env` like:

```
DB_CONNECTION=sqlite
DB_DATABASE=./database/database.sqlite
```

- For MySQL/Postgres, provide the appropriate database credentials in `.env`.

5. Run migrations and seeders:

```bash
php artisan migrate --seed
```

6. (Optional) Install Node packages and build front-end assets:

```bash
npm install
npm run dev
```

## Running the Application
Start the local development server with:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

The API will be available at `http://127.0.0.1:8000` and API routes are prefixed with `/api`.

## Running Tests
Run unit and feature tests with PHPUnit:

```bash
php artisan test
# or directly with PHPUnit
./vendor/bin/phpunit
```

## API Documentation (Endpoints)
Currently the project defines at least one test endpoint in `routes/api.php`:

- GET /api/test
  - Description: Health check for the API
  - Success response (200):

```json
{ "message": "API is working!" }
```

Call example with curl:

```bash
curl http://127.0.0.1:8000/api/test
```

Note: Additional RESTful endpoints and controllers are likely located under `app/Http/Controllers` or `app/RestfulApi`. To list all registered routes and their middleware, run:

```bash
php artisan route:list
```

## Authentication
This project includes `laravel/sanctum` in `composer.json`. You can protect endpoints using API tokens or session-based authentication.

Conceptual example (you need to implement routes/controllers):
- Login/Register endpoints (e.g. `/api/login`, `/api/register`) that return a token
- Use the token in requests via the Authorization header:

```
Authorization: Bearer {token}
```

See Laravel Sanctum docs for more: https://laravel.com/docs/sanctum

## Project Structure (brief)
- `app/` — application code (Models, Http/Controllers, Services, RestfulApi)
- `routes/` — route files: `api.php`, `web.php`, `admin.php`, ...
- `database/` — migrations, seeders, and the SQLite file (if used)
- `tests/` — unit and feature tests

## Troubleshooting & Tips
- If you encounter environment/key issues, ensure `.env` exists and `php artisan key:generate` has been run.
- List routes and middleware with:

```bash
php artisan route:list
```

- Application logs are located at `storage/logs/laravel.log`.

## Contributing
- Create a new branch for your changes and open a pull request.
- Please run tests and follow the project's coding standards before submitting a PR.

## License
This project is licensed under the MIT License — see the `LICENSE` file for details.

---

If you want, I can also:
- produce a bilingual README (Persian + English), or
- automatically scan and document all routes by running `php artisan route:list --json` and embedding them into the README.
