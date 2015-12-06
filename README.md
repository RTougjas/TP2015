# Photographic Archive

[![Build Status](https://travis-ci.org/RTougjas/TP2015.svg?branch=master)](https://travis-ci.org/RTougjas/TP2015)

##Installation

1. Set up a PHP server (we used apache 2.4.9).
    + Enable necessary plugins. For postgres they are `php_pgsql` and `php_pdo_pgsql`.
1. Edit `application/config/database.php` file to connect your database with the project.
2. Edit `application/config/recaptcha.php` file to include your own recaptcha keys.
2. Run the SQL queries in `user_guide/sql` folder, if you're using postgresql, or edit the files to fit your database and run it.
    + Run `postgres_fresh.sql` if there it's a new database or `postgres_update_3_to_4.sql` if there's a previous version running
3. Edit `application/config/ion_auth.php` to change security on login/registration.

##Default login

Username: admin@admin.com 

password: password
