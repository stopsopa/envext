<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once dirname(__FILE__).'/../vendor/autoload.php';
//phpinfo();



$data = array(
    'raz' => array()
);

$tmp = &$data['raz'];
$tmp['raz'] = array();

$tmp = &$tmp['raz'];
$tmp['raz'] = array();

$tmp = &$tmp['raz'];
$tmp['raz'] = array();

$tmp = &$tmp['raz'];
$tmp['raz'] = array();

$tmp = &$tmp['raz'];
$tmp['raz'] = array();

$data['dwa'] = $data;

dd($data);
dd($data);
dd($data);