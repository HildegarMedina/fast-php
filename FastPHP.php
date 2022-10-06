<?php

    namespace Hildegar\FastPHP;
    
    class FastPHP {
        
        function __construct($path_views='', $path_controllers='') {
            $this->request_uri = $_SERVER["REQUEST_URI"];
            $this->path_views = $path_views;
            $this->path_controllers = $path_controllers;
        }

        protected function route($url, $callback, $method) {
            $url_array = explode("/", $url);
            if ($_SERVER["REQUEST_METHOD"] != $method) return; 
            if (strpos($url, "{") !== false && count($url_array) == count( explode("/", $this->request_uri))) {
                $arr_values = [];
                foreach ($url_array as $key => $value) {
                    if (strpos($value, "{") !== false) {
                        $var_name = str_replace(['{', '}'],  "", $value);
                        $arr_values[$var_name] = explode("/", $this->request_uri)[$key];
                    }
                }
                $callback($arr_values);
            }else {
                if ($this->request_uri == $url) {
                    $callback();
                }
            }
        }

        public function get($url, $callback) {
            $this->route($url, $callback, "GET");
        }

        public function post($url, $callback) {
            $this->route($url, $callback, "POST");
        }

        public function put($url, $callback) {
            $this->route($url, $callback, "PUT");
        }

        public function delete($url, $callback) {
            $this->route($url, $callback, "DELETE");
        }

        public function print($message) {
            echo $message;
        }

        public function render($view) {
            require_once "$this->path_views/$view";
        }
        
        public function controller($controller) {
            $actionController = explode("::", $controller);
            require_once "$this->path_controllers$actionController[0].php";
            $controller = '\Controller\\' . $actionController[0] . "::$actionController[1]";
            $controller();
        }

    }
    