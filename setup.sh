#! /bin/bash

if [ -f "config/config.php" ]

then

    echo "SERVER STARTS AT PORT 9001"
    cd public
    php -S localhost:9001
    
else

    composer install
    composer dump-autoload -o
    
	$SQLUSERNAME
    $SQLPASSWORD
    
    echo 'Enter Details for mysql login'
    
	echo 'Enter Username:'
	read SQLUSERNAME
    
	echo 'Enter Password:'
	read SQLPASSWORD
    
    mysql -u$SQLUSERNAME -p$SQLPASSWORD -e "create database lib ;"
        
    mysql -u$SQLUSERNAME -p$SQLPASSWORD "lib"<schema/schema.sql
    
    touch config/config.php

	echo '<?php'>>config/config.php
	echo '$DB_HOST = "127.0.0.1" ;'>>config/config.php
	echo '$DB_PORT = "3306" ;'>>config/config.php
	echo '$DB_NAME = "lib" ;'>>config/config.php
    echo '$DB_USERNAME = "'$SQLUSERNAME'" ;'>>config/config.php
    echo '$DB_PASSWORD = "'$SQLPASSWORD'" ;'>>config/config.php

	
    echo "Starting server at port 9001"
	cd public
	php -S localhost:9001
fi