<?php

/**
 * @param $data
 * @param null $trace
 */
function dd($data, $trace = null) {
    d($data, $trace = debug_backtrace());
    die();
}