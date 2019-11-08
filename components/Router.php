<?php


class Router {
    
    private $routes; //variable with routes
    
    //Read and remember routes
    public function __construct() 
    {
        $routesPath = ROOT.'/config/routes.php'; //specify the path to routes
        $this->routes = include($routesPath); //assign an array with routes th the $routes property
        
    }
    //Returns request string
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    public function run() 
    {
        //get query string
        $uri = $this->getURI();
        
        
        //Check for such request in routes.php
        foreach ($this->routes as $uriPattern => $path) {
            
            //Compare $uriPattern and $uri
            if (preg_match("~$uriPattern~", $uri)) {
                
                //Get internal path from external according to the rule
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                
                
                //Determine which controller and action process the request, parameters
                $segments = explode('/', $internalRoute);
                
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                
                $parameters = $segments;
                
                
                
                //Include class-controller file
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                
                //Create object, call method
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
        
    }
}
