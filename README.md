## About L56Starter Project
L56Starter is a Laravel 5.6.* starter project. The project aims to make it quicker to scaffold out a new project that  
requires an ACL (access control list). The project has a basic admin panel with the bare necessities installed to manage  
users, roles, and permissions using the spatie/laravel-permission package.  
  
L56Starter project also uses the Laravel auth scaffolding so everything is already in place for user registration and  
login.
  
An account verification system is also in place to verify account users email address on new account registration or  
email address change.  
  
The project uses the following packages.  

[Twitter Bootstrap 4](https://getbootstrap.com/) for styling.
[FontAwesome 5](https://fontawesome.com/) for font icons,
[laracasts/flash](https://github.com/laracasts/flash) for flash messaging.
[Select2](https://github.com/select2/select2) for select form fields.
[bootstrap-confirmation2](https://github.com/mistic100/Bootstrap-Confirmation) for confirm dialogs.
[spatie/laravel-permission](https://github.com/spatie/laravel-permission) for role and permission management.
  
The project was setup to use Apache 2 web server with a document root of "public_html" NOT "public" because I host all  
my web applications on a WHM / cPanel VPS. I am sure with some minor tweaks the starter application could be used with  
other setups. Like NGINX server for example.  
  
Please note: it is possible to delete the admin user and role making it impossible to use the admin panel to create
users, roles, and permissions. Do not delete the default admin user, role, or permissions unless you intended to do so. 

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

### Installation
To install clone the github project using git

git clone git@github.com:RodShaffer/l56starter.git

Change to the l56starter directory and run

composer install

Change permissions on the "bootstrap" and "storage" directories to make them write able.

sudo chmod -R 777 ./bootstrap  
sudo chmod -R 777 ./storage

Setup a database and user, copy the "<strong>.env.example</strong>" file to "<strong>.env</strong>" and enter the
database connection info into the copied "<strong>.env</strong>" config file. 
  
Change everything else in the ".env" config file that is appropriate. 
  
Make sure to also update all appropriate "MAIL_" variables with your "mailtrap.io" account settings in your applications  
".env" config file if you would like to test the account verification system.  
  
Modify all appropriate information in the "config/site.php" and "config/admin.php" configuration files.
  
Then run  
  
php artisan key:generate  
  
Migrate the database(<strong>php artisan migrate</strong>).  
  
Seed the database(<strong>php artisan db:seed</strong>)  
  
The database seeding will create three roles, one (admin) which is the main administrator account for the site and  
therefore cannot be deleted through the admin panel GUI, two (user) this is the normal user account role, and three  
(unverified) which is the unverified user account role.  
  
Please note: Both the "user" and "unverified" roles are required for the account verification system to work correctly.  
When a new user registers on the site, or an existing user changes their email address, the verification system, if need  
be, removes the "user" role from the user, and assigns the "unverified" role to the user. When the user successfully  
verifies their account the "unverified" role is removed and the "user" role is re-assigned.  
  
The seeding will also setup the base permissions that are required to manage users, roles, permissions, and will create  
the main administrator account and also assign the admin role to the newly created account. The admin user can then be  
used to create more users, roles, and permissions.  
  
Default admin login email is  
admin@domain.com  
  
Default admin password is  
secret

Run npm install OR yarn install

Add a .htaccess to the "public_html" folder so routes get rewritten properly if needed. For an example look at  
"public_html\.htaccess.example" and replace "yourdomain.com" with the domain name your using for your web application.  
The example .htaccess also redirects all requests to "https" so if your not using https for what ever reason make sure  
to also change the "https" to "http" right before "yourdomain.com"

Browse to http://yourappdomain/admin to log into the admin panel

### Customizing the JavaScript and Styles

<u>For the normal site</u>  

JavaScript and styles see "webpack.mix.site.js", "resources/assets/sass/app.scss", and  
"resources/assets/sass/_variables.scss"  
Layout file used "resources/views/layouts/app.blade.php"

<u>For the admin panel</u>  
  
JavaScript and styles see "webpack.mix.admin.js", "resources/assets/sass/admin/admin.scss", and  
"resources/assets/sass/admin/_variables.scss"  
Layout file used "resources/views/admin/layouts/app.blade.php"  
  
For further info [check out](https://youtu.be/fXClf3Yiv84) my installation tutorial video and demonstration

### Enjoy!

## License

[MIT license](https://opensource.org/licenses/MIT).
