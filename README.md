
Deprecated because now it is implemented natively in xdebug and in symfony/var-dumper symfony module.
===

[![Latest Stable Version](https://poser.pugx.org/stopsopa/envext/v/stable)](https://packagist.org/packages/stopsopa/envext)

Inspiration
===

Annotation from VarDumper Component documentation [link](http://symfony.com/doc/current/components/var_dumper.html) :

![ScreenShot](https://raw.githubusercontent.com/stopsopa/envext/master/inspiration.bmp)


For God's sake, why this library?
===
Normal dump() function prints variable, but usually it's not enough. Line of execution function dump() is sometimes even more usefull information, especially when You debug something by placing more then one dump() in code and later wants to get rid all of them.

Example:

![ScreenShot](https://raw.githubusercontent.com/stopsopa/envext/master/web.bmp)

Usage 
===

This library provides two functions "d()" and "dd()":

* function d() prints data and terminate script by die()
* function dd() prints data and allows script to continue

Installation without including to project
===

    sudo -i
    
    cd /bin
    
    composer require stopsopa/envext:dev-master
    
add to php.ini (http and cli mode) (/etc/php.ini for centos):    
    
    auto_prepend_file = /bin/vendor/autoload.php  
    
setup nginx (usually somewhere in /etc/nginx/sites-enabled/default.conf) ...
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index app.php;
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_param PHP_VALUE "auto_prepend_file = /bin/vendor/autoload.php";
    }
 
.. or setup apache2

    <Directory />
        AllowOverride none
        Require all denied
        Php_value auto_prepend_file /bin/vendor/autoload.php
    </Directory>
    
restart nginx/apache (... or other http server)
    
centos    
  
  
    /etc/init.d/nginx restart
    sudo apachectl restart
     
ubuntu
     
     
    sudo service nginx restart
    sudo service apache2 restart

Test
===

cli



    echo '<?php dd("one");d("stop here");d("should t see this");' > test.php && php test.php && rm test.php
    
    
web
    
    
    echo '<?php dd("one");d("stop here");d("should t see this");' > test.php
    
... and call from web, then remove test.php    
    
    


