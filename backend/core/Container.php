<?php

namespace Core;

use Closure;
use Exception;
use ReflectionClass;

class Container
{
    private array $bindings = [];
    private array $instances = [];

    public function bind(string $abstract, callable $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function resolve(string $abstract)
    {
        if (isset($this->instances[$abstract])) return $this->instances[$abstract];

        if ($this->bindings[$abstract] instanceof Closure) return $this->bindings[$abstract];

        if (!isset($this->bindings[$abstract])) throw new Exception("$abstract Not Found");

        return $this->getObject($this->bindings[$abstract]);
    }
    public function singleton(string $abstract, callable $concrete)
    {
        $this->instances[$abstract] = $this->getObject($concrete);
    }

    private function getObject(string $concrete)
    {

        $ref = new ReflectionClass($concrete);

        return $ref->newInstanceArgs(...$this->resolveDependencies(
                $ref->getConstructor()->getParameters()
                )
            );
    }
    /**
     * get method dependencies
     * 
     * 
     */
    public function resolveDependencies(array $params): array
    {
        $dependencies = [];

        foreach ($params as $param) {
            $type = $param->getType();
            if (!$type) throw new Exception("Cannot resolve this");
            $dependencies[] = $this->resolve($type->getName());
        }
        return $dependencies;
    }
}
