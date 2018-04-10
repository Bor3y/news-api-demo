## Simple api Demo

simple REST API for news. 
Each entity contain the following information: id, date, title, short description, text.
API results should be sortable by date and/or title. 
API results may be filtered by date and/or title.

#### Running steps 

- ``` composer install ```
- ``` php artisan migrate ```
- ``` php artisan db:seed ```
- ``` php artisan serve ```


- [WebL'Agence](https://github.com/esbenp/bruno)

#### API List

- ``` 
    get (api/news)
     
```


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
