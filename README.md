provide in steps how to build the project and make it up and running
1- Create laravel project:
   composer create-project --prefer-dist laravel/laravel projectName
2- Move to the project folder:
   cd projectName
3- Open vscode in the project directory
   code .
4- Create controller
   php artisan make:controller ControllerName
5- Create model
   php artisan make:model ModelName
6- Create database table
   php artisan make:migration create_tableName_table
7- Run migration
   php artisan migrate
8- Go to hosting provider and create database
9- in .env file, connect to the host database
10- run this command to make the project in production mode
    npm run prod
11- upload the project to the host
12- go to the domain to see the deployed project
