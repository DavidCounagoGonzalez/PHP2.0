<?php

namespace Com\Daw2\Core;

class Config {

    private $vars;
    private static $instance;

    private function __construct() {
        $this->vars = array();
    }

    function set($name, $value) {
        if (!isset($this->vars[$name])) {
            $this->vars[$name] = $value;
        }
    }

    public function get($name) {
        if (isset($this->vars[$name])) {
            return $this->vars[$name];
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $class = __CLASS__; //otra forma
            self::$instance = new $class();
        }
        return self::$instance;
    }

}
