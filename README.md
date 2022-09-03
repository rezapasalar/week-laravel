# A project for Week Company designed with Laravel.
- Coding by Laravel 9 And Livewire 2.
- Websocket is used to make the project real-time.
- File and database backup.
- Template design with Tailwindcss and Alpinejs (Dark Mode).
- Multi-Language
- Has a admin panel
# Installation
### Create database in mysql
```sql
CREATE DATABASE week
CHARACTER SET 'utf32'
COLLATE 'utf32_persian_ci';
```
### Download and Import
Download the database file from the link below and import it in mysql.
### [week.sql](./public/database)
### Installing JavaScript packages
```
npm install
```
### Installing Laravel packages
```
composer i
```
### Making available the required files of the project
```
php artisan storage:link
```
### Activating the websocket server
```
php artisan websockets:serve
```
### Activate the server to run the project
```
php artisan serve
```
### Go to the following link to enter the management panel
```
http://localhost:8000/auth/login
```
Email
```
admin@gmail.com
```
Password
```
11111111
```
