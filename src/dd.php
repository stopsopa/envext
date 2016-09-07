<?php

/**
 * Breaks/terminates script after print variable
 */
function dd($data, $trace = null) {
    d($data, $trace = debug_backtrace());
    die();
}