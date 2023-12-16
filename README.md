<p align="center">
    <h1 align="center">Yii 2  Project API RESt</h1>
    <br>
</p>


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install via Composer

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database mongodb

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\mongodb\Connection',
    'dsn'=> 'mongodb+srv://usuario:password@cluster0.7tvfdgo.mongodb.net/',
    'defaultDatabaseName' => 'library',  //name of your database
];
```

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### API
To start the project run the following command

```
php yii serve
```
- to list all books.
```
GET  http://localhost:8080/books
```
- To create a new book 
```
POST http://localhost:8080/book/create-book
{
    "title":"tests1",
    "author": "Diana",
    "yearPublication":"2021",
    "genre": "comedi",
    "language": "espanol",
    "description": "una pequena comedia en espanol para disfrutar en familia"
}
```
- get a book for the language
```
GET http://localhost:8080/book/get-book-by-language?language=espanol
```
- get a book by id
```
GET http://localhost:8080/book/get-book-by-id?id=123
```
- update a book
```

PUT http://localhost:8080/book/update-book?id=123
{
    "title":"tests1",
    "author": "Diana",
    "yearPublication":"2021",
    "genre": "comedi",
    "language": "espanol",
    "description": "una pequena comedia en espanol para disfrutar en familia"
}
```
- delete a book
```
PUT http://localhost:8080/book/delete-book?id=123
```

### Improvements
- Add Author collection 
- Add unit test
- Add aggregation to work with collections