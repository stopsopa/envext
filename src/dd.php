<?php

if (function_exists('dd')) {
    /**
     * Prints variable and allow script to continue.
     */
    function _dd($data, $trace = null) {

        if (!function_exists('dump')) {
            throw new \Exception("Can't find dump() function, install: composer global require symfony/var-dumper");
        }

        if (!$trace) {
            $trace = debug_backtrace();
        }

        $trace = array_shift($trace);

        $line = $trace['file'].':'.$trace['line'];

        if ('cli' === PHP_SAPI) {
            $line .= "\n";
        }
        else {
            $line = '<div style="padding:3px;background-color:#B13030;color:#F9FF00;font:12px Menlo,Monaco,Consolas,monospace;margin-bottom:-12px;">'.$line.'</div>';
        }

        fwrite(STDOUT, $line);

        dump($data);
    }
}
else {
    /**
     * Prints variable and allow script to continue.
     */
    function dd($data, $trace = null)
    {

        if (!function_exists('dump')) {
            throw new \Exception("Can't find dump() function, install: composer global require symfony/var-dumper");
        }

        if (!$trace) {
            $trace = debug_backtrace();
        }

        $trace = array_shift($trace);

        $line = $trace['file'] . ':' . $trace['line'];

        if ('cli' === PHP_SAPI) {
            $line .= "\n";
        } else {
            $line = '<div style="padding:3px;background-color:#B13030;color:#F9FF00;font:12px Menlo,Monaco,Consolas,monospace;margin-bottom:-12px;">' . $line . '</div>';
        }

        fwrite(STDOUT, $line);

        dump($data);
    }
}
