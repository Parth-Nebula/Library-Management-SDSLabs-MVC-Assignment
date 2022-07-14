# Library-Management-SDSLabs-MVC-Assignment

> Library Management System in mvc structure using torophp

## Setup

1. Clone the repository and `cd` into it.

2. Install composer using:
    ```console
    > curl -s https://getcomposer.org/installer | php
    > sudo mv composer.phar /usr/local/bin/composer
    ```

3. Install dependencies and dump-autoload:
    ```console
    > composer install
    > composer dump-autoload -o
    ```

4. Edit `config/config.php` accordingly

5. Import schema present in `schema/schema.sql` in your database.

6. Serve the public folder at any port (say 9001):
    ```console
	> cd public
    > php -S localhost:8000
    ```
    
Note : an admin and a user account have already been made with username abc and password abc .


## Setup for Windows

1. Install php ( if not already installed )

    
    go to https://www.apachelounge.com/download/ and download the latest version of httpd ( 2.4.54 as of this release ) according to your operating system
    
    Extract its Apache24 to the root of your C: drive ( such that bin is C:\Apache24\bin )
    
    Also install vc_redist_x64 from the same site ( https://www.apachelounge.com/download/ )
    
    Then open command promt and start Apache with command
    
    ```console
	> cd C:/Apache24/bin
    > httpd
    ```
    
    Open http://localhost on any browser
    
    if It Works! appears, then it has been successfull setup.
    
    
    Now,
    
    go to https://www.php.net/downloads.php 
    
    then go to windows downloads
    
    then download php 7.4 (7.4.30) Zip (thread safe)
    
    Extract its php to the root of your C: drive ( such that ext is C:\php\ext )
    
    Make a copy of C:\php\php.ini-developement in C:\php name it php.ini
    
    then open php.ini in a text editor
    
    then uncomment the following lines by removing the leading ; from them
    
    extension=curl
    extension=gd
    extension=mbstring
    extension=pdo_mysql
    
    
    Now,
    
    search env in your windows search bar and go to Edit the system environment variables
    
    from there go to Environment Variables...
    
    then click on Path
    
    then edit
    
    then new
    
    then write C:\php
    
    and press ok
    
    exit Edit the system environment variables by pressing ok
    
    
    Now,
    
    go to C:\Apache24\conf\httpf.conf
    
    open it using a text editor
    
    add the following lines at the bottom 
    
    ```console
    # PHP7 module
    PHPIniDir "C:/php"
    LoadModule php7_module "C:/php/php7apache2_4.dll"
    AddType application/x-httpd-php .php
    ```
    
    Now, 
    
    open command promt and write
    
    ```console
	> cd C:/Apache24/bin
    > httpd -t
    ```

    a Syntax OK should appear
    
2. Install composer ( if not already installed )


    go to https://getcomposer.org/download/ and download Composer-Setup.exe
    
    run it !
    

    ```
    
3. Edit `config/config.php` accordingly

4. Import schema present in `schema/schema.sql` in your database.

5. install dependencies and dump-autoload:

    open command promt and cd into the repository
    
    then write 
    
    ```console
    > composer install
    > composer dump-autoload -o
    ```
    
6. Serve the public folder at any port (say 9001):

    open command promt and cd into the repository
    
    then write
    
    ```console
	> cd public
    > php -S localhost:9001
    ```


Now you can run your sites by doing step 6 and going to http://localhost:9001 on any browser


Note if you ever change the class structure ( add / delete / change existing classes ), you will have to

open cmd 

cd into the repository

then run

```console
> composer dump-autoload -o
```


You can also setup virtual hosting by following the following steps

1. Install Apache Web host ( if not already installed )

    open cmd with admin priviliges
    
    cd to bin folder in your Apache installation ( C:\Apache24\bin )
    
    run

    httpd -k install
    
    httpd -k restart


2. Setup Apache config file


    go to the folder of your apache installation

    go to Apache24\conf\extra\httpd-vhosts.conf

    append the code given in mvc.sdslabs.local.conf into httpd-vhosts.conf *after making the mentioned changes*

    
    
    go to the folder of your apache installation ( C:\Apache24 )

    go to Apache24\conf\httpd.conf

    confirm that 

    ```console
    Include conf/extra/httpd-vhosts.conf
    ```

    and

    ```console
    LoadModule rewrite_module modules/mod_rewrite.so
    ```

    are not commented out
        
3. Setup website hosts

    go to C:\Windows\System32\drivers\etc\hosts
    
    in this file append
    
    ```console
    127.0.0.1   YourDesiredWebsiteName.org  
    ```
4. Setup php.ini file

    go to the folder of your php installation
    
    find php.ini file in it
    
    open it using any text editor
    
    in it 
    
    extension_dir should be equal to the path of the ext folder in your php installation instead of just "ext"
    
    like 
    
    ```console
    extension_dir = "C:\php\ext"
    ```

Now you can run your sites by going to YourDesiredWebsiteName.org on any browser

Note : an admin and a user account have already been made with username abc and password abc .
