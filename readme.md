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

- The next step, open phpadmin to create database and import file database foodee.sql into it.
- And, don't forget change DB_DATABASE, DB_USERNAME, DB_PASSWORD at .env responding your account login phpadmin
- Finally, open website with domain:
```sh
dev.foodee.vn
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
