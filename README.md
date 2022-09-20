
# CRUD operations in Laravel and NEO4J DB

It is a simple project for apply CRUD operations on students data using Laravel framework and NEO4J database.
Laravel Framework version is 6.20.44 .This video helped me a lot in connecting this database to Laravel as my first time working with it
[[Link]](https://youtu.be/fQrHAh4RXJw).

![Logo](https://laravelnews.imgix.net/images/laravel-featured.png?ixlib=php-3.3.1)


## Getting started

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer install 
  or 
  composer update
```
Create .env file by copying .env.example and rename it to .env and generate key
```bash
  cp .env.example .env
  php artisan key:generate
```
Add your database configuration in the .env file
```bash
  NEO4J_HOST=localhost
  NEO4J_PORT=7687
  NEO4J_USERNAME=
  NEO4J_PASSWORD=
  NEO4J_PASSWORD_TESTING=
  NEO4J_USE_SSL=false
```
Run your database.

Start the server

```bash
  php artisan serve
```
## Features

- Create new student
- Edit student data
- delete student


## Lessons Learned
You will be able to connect your NEO4J DB to Laravel and process data through that database.

## Screenshots
Home Page

![home page](https://drive.google.com/uc?export=view&id=1uGC-lHVN5Bc1O7ZYJb1eMv6LdvW8vnBi "home page")

Create New Student:

![create student](https://drive.google.com/uc?export=view&id=1hXUwCPxwS3G7J0G3YNohIzlXEnfxIFUt "create student")

Edit Student:

![edit student](https://drive.google.com/uc?export=view&id=1AY3q3E4iStd0W3-oBAnePg1bCoNwCZdl "edit student")
## Authors

- [@hader_afat](https://github.com/hader-afat)


## Future work will be added later

- Handling errors in a user-friendly manner.
- Create an authentication system.
- Make the student able to add a photo.
- Add the student’s parents and add some powers to them, such as knowing the degrees of their children.
- Adding some study materials and the possibility of students registering in them.
- Add some additional information about the student.