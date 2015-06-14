## Install

## vhost:
```
<VirtualHost localhost:80>
       DocumentRoot "/Library/WebServer/Documents"
       <Directory "/Library/WebServer/Documents">
           Options Indexes FollowSymLinks Multiviews
           MultiviewsMatch Any
           AllowOverride All
           Require all granted
       </Directory>
</VirtualHost>
<VirtualHost blog.dev:80>
     ServerName blog.dev
     ServerAlias *.blog.dev
     DocumentRoot "/Users/viller_m/rendu/PHP_Avance_II_My_Blog-Creator/public"
     <Directory "/Users/viller_m/rendu/PHP_Avance_II_My_Blog-Creator/public">
       Options +FollowSymLinks
       AllowOverride All
       Order allow,deny
       Allow from all
     </Directory>
   </VirtualHost>
```

## dnsmask
http://asciithoughts.com/posts/2014/02/23/setting-up-a-wildcard-dns-domain-on-mac-os-x/

### mac:
```
brew install dnsmasq
mkdir -p /usr/local/etc
echo "address=/.dev/127.0.0.1" > /usr/local/etc/dnsmasq.conf

sudo cp -fv /usr/local/opt/dnsmasq/*.plist \
  /Library/LaunchDaemons
  
sudo launchctl load \
  /Library/LaunchDaemons/homebrew.mxcl.dnsmasq.plist
  
sudo mkdir -p /etc/resolver
sudo sh -c 'echo "nameserver 127.0.0.1" > /etc/resolver/dev'
```

### linux: 'a tester'
```
apt-get install dnsmasq
echo "address=/.dev/127.0.0.1" > /etc/dnsmasq.conf
sudo mkdir -p /etc/resolver
sudo sh -c 'echo "nameserver 127.0.0.1" > /etc/resolver/dev'
/etc/init.d/dnsmasq restart
```

## run the following comands:
```
composer install
npm install
bower install
php artisan migrate --seed
php artisan serve
gulp
```

## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
