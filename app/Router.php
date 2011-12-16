<?php
class Router {

    private $controller;

    private $action;

    private $args;

    public function __construct($uri)
    {
    	$last_slesh = substr($uri, -1);
    	if($last_slesh == '/') $uri = substr($uri, 0, -1);
		$uri_array = explode('/', $uri);
		
    	switch (sizeof($uri_array)) {
    		case 0-1:
    			$this->controller = 'index';
    			$this->action = 'index';
    			$this->args = array();
    			break;
    		case 2:
    			$this->controller = $uri_array[1];
    			$this->action = 'index';
    			$this->args = array();
    			break;
    		case 3:
    			$this->controller = $uri_array[1];
    			$this->action = $uri_array[2];
    			$this->args = array();
    			break;
    		default:
    			$this->controller = $uri_array[1];
    			$this->action = $uri_array[2];
    			$arg_key = '';
    			$arg_array = array();
    			foreach ($uri_array as $key => $value) {
    				if($key<3) continue;
    				if($arg_key == '') $arg_key = $value; 
    					else {
    						$arg_array[$arg_key] = $value;
    						$arg_key = '';
    					}
    			}
    			$this->args = $arg_array;
    		
    	}
    }

    public function getController()
    {
		return $this->controller;
    }

    public function getAction()
    {
		return $this->action;
    }

    public function getArgs()
    {
		return $this->args;
    }
    
    public function dispatch() {
    	$controller_class = "\\Controllers\\".ucwords($this->getController())."Controller";
    	$controller_action = ucwords($this->getAction())."Action";

    	$controller = new $controller_class();
    	echo $controller->$controller_action();
    }
}