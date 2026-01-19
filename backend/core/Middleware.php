<?php
namespace Core;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface Middleware{
    public function handle(ServerRequestInterface $req, RequestHandlerInterface $handler):ResponseInterface;
}