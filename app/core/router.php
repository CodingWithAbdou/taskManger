

<?php 

class Router {

    private  $get = [];
    private  $post = [];

    public static function make() {
        $router = new self ;
        return $router ;
    }

    public function get($uri , $action) {
        $this->get[$uri]  = $action;
        return $this;
    }

    public function post($uri , $action) {
        $this->post[$uri]  = $action;
        return $this;
    }


    public function resolve($uri , $method) {
        if (array_key_exists($uri , $this->{$method})) {
            $array =  $this->{$method}[$uri];
            $this->callAction(...$array);
        }else {
            throw new Exception("page is not found");
        }
    }

    protected function callAction($TaskController , $method) {

        $controller = new $TaskController;

        $controller->{$method}();

    }
}