<?php

function dd($data, $trace = null) {
    d($data, $trace = debug_backtrace());
    die();
}