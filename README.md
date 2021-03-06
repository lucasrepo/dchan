# DChan
## Dependencias
- [Composer](https://getcomposer.org/).
- PHP>=**7.3**: [Windows](https://www.php.net/manual/es/install.windows.php), [Unix](https://linuxize.com/post/how-to-install-php-on-ubuntu-20-04/).
- Web service: [WAMP para windows](https://es.wikipedia.org/wiki/WAMP) y [LAMP para linux](https://es.wikipedia.org/wiki/LAMP).
- SQLite3 _(viene con wamp o lamp)_.

## Instalación
- Clonan el repositorio.
- Actualizan con composer: _composer update_
- Copian _.env.example_ y lo pegan en _.env_. Allí ponen la base de datos (En el siguiente punto explico) y generan una "private key" con la consola: _php artisan key:generate_.
- Crean una base de datos con SQLite3 en _/storage/public/app/_ con el siguiente nombre: _database.sqlite_. Con _php artisan migrate:install_ se crean las columnas, terminado.
- Servidor con: _php artisan serve_. **¡Y listo, podés usar la página!**

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).