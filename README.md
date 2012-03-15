# Chinook App #

Welcome to Chinook App. This is a test application for training purposes. In order to get running
you must follow the steps described below.

## Requirements ##

In order to run the component tests you must have installed the DBUnit package from the PHPUnit
PEAR's channel.

```sh
> sudo pear install phpunit/DBUnit
```

## Clone it ##

Clone it in some directory. You can clone it directly inside the path
```/datos/workspace/emagister/chinook-app``` to leverage the pre-configured Apache virtualhost.

```sh
> cd /datos/workspace/emagister
> git clone git://github.com/Emagister/ChinookApp.git chinook-app
```

## Download composer.phar and install the depedencies ##

The dependencies are handled through composer, so composer must be downloaded and executed in
order to install all the deps

```sh
> cd chinook-app
> wget http://getcomposer.org/composer.phar
> php composer.phar install
```

## Configure the virtual host and the hosts file ##

Add this virtualhost in your virtual hosts file

```apache
# Chinook Application
<VirtualHost *:80>
  DocumentRoot "/datos/workspace/emagister/chinook-app/web"
  ServerName chinook.local
  DirectoryIndex index.php

  <Directory "/datos/workspace/emagister/chinook-app/web">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>
```

And then add this line to your hosts file

```sh
127.0.0.1 chinook.local
```

Restart apache

```sh
> sudo apachectl -k restart
```

## Enjoy it! ##

Enjoy sexy-testing! :D