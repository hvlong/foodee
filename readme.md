<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Foodee Site

The project demo use laravel framework, project include website and admin to manage. The Website introduce about restaurant, menu, feature foods, event,... and admin site to manage delete, add, edit items.

## Getting Started:

First,  run the following:

- Install XAMPP
- Move to htdocs
- Clone project from git:
```sh
git clone https://github.com/hvlong/foodee.git
```
- Add and configure virtual host at file C:\xampp\apache\conf\extra\httpd-vhosts.conf:
```sh
<VirtualHost *:80>
        ServerName dev.foodee.vn
        DocumentRoot "C:\xampp\htdocs\foodee\public"

        ErrorLog "logs/dev.foodee.vn-error.log"
        CustomLog "logs/dev.foodee.vn-access.log" common
        <Directory C:\xampp\htdocs\foodee\public>
                AllowOverride All
                Require all granted
        </Directory>
</VirtualHost>
```

- Add host name of project to hosts file at folder C:\Windows\System32\drivers\etc:
```sh
127.0.0.1 dev.foodee.vn
```


## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
