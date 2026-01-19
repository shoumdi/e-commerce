<?php

namespace Core;

use Closure;
use ReflectionMethod;

class Application
{
    private Router $router;
    private Container $container;

    public function __construct() {}

    public function useRouter($router)
    {
        $this->router = $router;
    }
    public function useContainer($container)
    {
        $this->container = $container;
    }

    function run()
    {
        $this->router->dispatch(
            $this->container->resolve(Request::class),
            fn(array $handler) => $this->resolveHandler($handler)
        );
    }


    /**
     * @handler could be either callback or assoc array where handler[0] is controller
     * and handler[1] for action
     */
    private function resolveHandler(callable $handler)
    {
        if($handler instanceof Closure) return $handler();
        [$controllerName, $methodName,$middlwares] = $handler;
        $controller = $this->container->resolve($controllerName);
        $refMethode = new ReflectionMethod($controller,$methodName);
        $dependencies = $this->container->resolveDependencies($refMethode->getParameters());
        // return call_user_func([$controller,$methodName],$dependencies);
        return $controller->$methodName(...$dependencies);
    }
}
