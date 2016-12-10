<?php

// http://stackoverflow.com/a/28898174
if (!defined('STDOUT')) {
    define('STDOUT', fopen('php://output', 'w'));
}

\Symfony\Component\VarDumper\VarDumper::setHandler(function ($var) {
    $cloner = new \Symfony\Component\VarDumper\Cloner\VarCloner();
    $dumper = 'cli' === PHP_SAPI ? new \Symfony\Component\VarDumper\Dumper\CliDumper() : new \Stopsopa\VarDumper\HtmlDumper();

    $dumper->dump($cloner->cloneVar($var));
});
