<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once dirname(__FILE__).'/../vendor/autoload.php';

//phpinfo();

error_reporting(E_ALL);
ini_set('display_errors',1);

use Stopsopa\VarDumper\Profile;

$profile = Profile::getInstance();
//$profile->disable();
$profile->log('message');
usleep(1000000 * 0.2); // 0.2 sek
$profile->log('message2');

$profile->get(function ($data) {
//    $data['test'] = $data;
//
//    $tmp = &$data['test'];
//    $tmp['test'] = $tmp;
//
//    $tmp = &$tmp['test'];
//    $tmp['test'] = $tmp;
//
//    $tmp = &$tmp['test'];
//    $tmp['test'] = $tmp;
//
//    $tmp = &$tmp['test'];
//    $tmp['test'] = $tmp;
//
//    $tmp = &$tmp['test'];
//    $tmp['test'] = $tmp;

    dd($data);
    dd($data);
    dd($data);
    d($data);
});