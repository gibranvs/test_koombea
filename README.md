# KOOMBEA TEST

This is the Gibrán Vázquez Test

## INSTALLATION

Copy or clone this repository under a public http folder.

Create a database called test_koombea_db

Run the test_koombea_db.sql script in test_kooombea_db

Go to app/Config/App.php and edit 

    public $baseURL = 'http://localhost:8888/test_koombea/';

using the URL where it is located.

Go to app/Config/Database.php and update with your MySQL connection settings (username, password, db if name has changed).



## TECHNOLOGIES USED

-Codeigniter 4
-JQuery 3.7.1
-Bootstrap 5.3
-MySQL 5.7



## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
- DOMDocument
