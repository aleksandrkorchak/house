# Houses

Was used:
1. __Laravel Homestead 9.1__
2. __Nginx__
3. __PHP 7.3__
3. __MySQL 5.7__
4. __Laravel Framework 5.7__
5. __Vue.js 2.5__
***
To install the application you need: 
1. Clone repository: 
	- `git clone https://github.com/aleksandrkorchak/house.git`
2. Updates all packages and its dependencies: 
	- `composer update --with-dependencies`	
3. Install the dependencies in the local node_modules folder: 
	- `npm install`
4. Copy file "__.env.example__" and rename it to "__.env__"
5. Run command: `php artisan key:generate`
6. Create database "house"
7. Change settings of the database in "__.env__" file. For example:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=33060
   DB_DATABASE=house
   DB_USERNAME=root
   DB_PASSWORD=
   ```
8. Drop all tables in the database, migrate and run all database seeds:
	- `php artisan migrate:fresh --seed`
9. Set up domain on the Webserver

