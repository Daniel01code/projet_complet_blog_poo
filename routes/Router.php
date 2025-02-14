<?php
namespace Router;

use App\Ecxception\NotFoundException;

class Router{
    public $url;

    public $routes = [];

    public function __construct($url){
        $this->url= trim($url, '/'); //la fonction "trim" c'est pour retirer un element generalement utilisé sur les chaine de caractère
    }

    public function get(string $path, string $action){

        $this->routes['GET'][]= new Route($path, $action);
    }

    public function run(){

        foreach($this->routes [$_SERVER['REQUEST_METHOD']] as $route){

            if($route->matches($this->url)){ 
                return $route->execute();
            }
        }
        throw new NotFoundException("la page demandé est introuvable");
    }
}
