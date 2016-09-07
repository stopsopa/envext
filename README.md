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
* function dd() prints data and lets script to continue

Installation without including to project
===

    sudo -i
    
    cd /bin
    
    composer require stopsopa/envext:dev-master
    
add to php.ini (http and cli mode):    
    
    auto_prepend_file = /bin/vendor/autoload.php  
    
restart apache (... or other http server)
    
centos    
  
  
    sudo apachectl restart
     
ubuntu
     
     
    sudo service apache2 restart

Test
===

cli



    echo '<?php d("test");' > test.php && php test.php && rm test.php
    
    
web
    
    
    echo '<?php d("test");' > test.php
    
... and call from web, then remove test.php    
    
    


