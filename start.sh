#!/bin/bash

echo "Let's get started."

echo Installing generators
gsed -i 's/"4.1.*"/"4.1.*",\n\t\t"way\/generators": "1.1"/' composer.json
gsed -i "s/WorkbenchServiceProvider',/WorkbenchServiceProvider',\n\t\t'Way\\\Generators\\\GeneratorsServiceProvider'/" app/config/app.php

echo Updating composer
composer update

echo Creating MySQL database
mysql -uroot -p -e "CREATE DATABASE larademos"

echo Updating database configuration file
gsed -i "s/'database'  => 'database'/'database'  => 'larademos'/" app/config/database.php
gsed -i "s/'password'  => ''/'password'  => '1234'/" app/config/database.php

echo -n "Do you need a users table? [yes|no] "
read -e ANSWER

if [ $ANSWER = 'yes' ]
then
    echo Creating users table migration
    php artisan generate:migration create_users_table --fields="username:string:unique, email:string:unique, password:string"

    echo Migrating the database
    php artisan migrate
fi
