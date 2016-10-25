<?php

namespace Stopsopa\VarDumper;

/**
 * Class Profile
 * @package Libs
 *
 * $profile = Profile::getInstance();
 * $profile->enable(false);
 *
 * $profile->log('message');
 *
 * $profile->get(function ($data) {
 *     d($data);
 * });
 *
 */
class Profile {
    protected $stack = array();
    protected $enabled;
    protected function __construct($msg = null) {

        if ($msg) {
            $this->stack[] = $this->dump($msg);
        }

        $this->enabled = true;
    }
    protected function dump($msg) {
        return array(
            $msg,
            microtime(true),
            static::bytesToSize1024(memory_get_usage(true)),
            static::traceLine(debug_backtrace())
        );
    }
    public function enable($true = true) {
        $this->enabled = $true;
    }
    public function isEnabled() {
        return $this->enabled;
    }
    /**
     * @param string $name
     * @return Profile
     */
    public static function getInstance($name = 'start') {

        $cls = get_called_class();

        return new $cls($name);
    }
    public function log($msg) {

        if (!$this->enabled) {

            return $this;
        }

        $this->stack[] = $this->dump($msg);

        return $this;
    }

    /**
     * @param $trace debug_backtrace()
     */
    public static function traceLine($trace) {

        if (!$trace) {
            $trace = debug_backtrace();
        }

        $trace = array_shift($trace);

        $line = $trace['file'];

        if (strpos(strtolower($line), '.php') === (strlen($line) - 4) ) {
            $line = substr($line, 0, -4);
        }

        $line .= ':'.$trace['line'];

        return $line;
    }
    public function get(callable $fn = null) {

        if (!$this->enabled) {

            return null;
        }

        $last = null;

        $tmp = $this->stack;

        foreach($this->stack as $key => $d) {

            if (!is_null($last)) {
                $tmp[$key][1] = round($d[1] - $last, 4);
            }

            $last = $d[1];
        }

        if ($this->enabled) {

            return call_user_func($fn, $tmp);
        }

        return $tmp;
    }

    /**
     * http://codeaid.net/php/convert-size-in-bytes-to-a-human-readable-format-(php)
     */
    protected static function bytesToSize($bytes, $precision = 2, $base) {
        $bases = array('B','KB','MB','GB','TB','PB','EB');
        $data = @round(
                $bytes / pow($base, ($i = floor(log($bytes, $base)))), $precision
            ).' '.$bases[$i];
        return ($base === 1000) ? strtolower($data) : $data ;
    }
    public static function bytesToSize1000($bytes, $precision = 2)
    {
        return static::bytesToSize($bytes, $precision, 1000);
    }
    public static function bytesToSize1024($bytes, $precision = 2)
    {
        return static::bytesToSize($bytes, $precision, 1024);
    }
}
