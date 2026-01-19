<?php

namespace Core;

use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Router
{
    private array $routes = [];

    /**
     * 
     */
    public function get(string $path, array $handler,array $middlwares = [])
    {
        $this->routes["GET"][$path]= ["handler"=>$handler,"middlewares"=>$middlwares];
    }
    public function post(string $path, array $handler,array $middlwares = [])
    {
        $this->routes["POST"][$path] = ["handler"=>$handler,"middlewares"=>$middlwares];
    }

    
    public function dispatch(ServerRequestInterface $req, callable $resolveHandler): ResponseInterface
    {
        $method = $req->getMethod();
        $path = $req->getUri()->getPath();
        $handler = $this->routes[$method][$path];
        if (!$handler) return new HtmlResponse('Not Found', 404);
        return $resolveHandler($handler);

    }
}
