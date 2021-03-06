# jelly-auth-demo

**[jelly-auth-demo](http://github.com/rob/jelly-auth-demo)** is a demo user registration application for Kohana 3 using [Jelly](http://github.com/jonathangeiger/kohana-jelly) and [jelly-auth](http://github.com/raeldc/jelly-auth).

## Installation Instructions

*jelly-auth-demo* has only been tested with MySQL.

1. Download

        git clone git://github.com/rob/jelly-auth-demo.git

2. Initialize and update the submodules

        git submodule init
        git submodule update
        
3. Rename `database.sample.php` to `database.php` in `application/config/database.php`

4. Edit `application/config/database.php` with your database details

5. Insert the MySQL tables. The SQL data file can be found in `data/sql/jelly-auth-schema.sql`

        # example (command-line)
        mysql -u <user> -p <db_name> < data/sql/jelly-auth-schema.sql

6. **(Optional)** Change the values of `salt_pattern` and `session_key` in `application/config/auth.php`

If you are installing *jelly-auth-demo* into a subdirectory (e.g., http://domain.com/jelly-auth-demo/), you will need to change `RewriteBase` in `.htaccess` and `base_url` in `application/bootstrap.php`.
