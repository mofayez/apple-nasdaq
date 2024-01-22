## About Project

This project is a based on Laravel and  built using hexagonal architecture It enables the you to Register, login, and do other auth stuff.
We take Apple.Inc here as an example of a company to show its details as well as the stock info depending on polygon open API.

## Running

### Configure your .env file

Database example :
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=apple-nasdaq
DB_USERNAME=root
DB_PASSWORD=root

COMPANY_SYMBOL=AAPL
POLYGON_API_KEY=mUBLQouY09PwL9ZZtWaqSXLkKUnECJ1x
```

```
### Create tables
```bash
php artisan migrate
```
### Fake data

```bash
php artisan db:seed
```
### Final steps
```bash
php artisan serve
```

## Docker image run
```bash
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail up
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
