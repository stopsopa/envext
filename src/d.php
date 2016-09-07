<?php

if (function_exists('d')) {
    /**
     * Breaks/terminates script after print variable
     */
    function _d($data, $trace = null) {
        _dd($data, $trace = debug_backtrace());
        die();
    }
}
else {
    /**
     * Breaks/terminates script after print variable
     */
    function d($data, $trace = null) {
        dd($data, $trace = debug_backtrace());
        die();
    }

}