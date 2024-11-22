<?php
class App {
    protected $controller = 'TaskController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();
        
        if (!empty($url) && file_exists("controllers/{$url[0]}.php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }        

        require_once "controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        if (!empty($url) && isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);

            $this->params = $url ? array_values($url) : [];
        }        

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return []; // Kembalikan array kosong jika tidak ada URL
    }    
}
?>