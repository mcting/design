<?php


namespace MCTing\Design\IoC;

use Closure;
use ReflectionClass;
use Exception;
use ReflectionException;
use ReflectionParameter;

class Container
{
    private $building = [];

    /**
     * 绑定接口和生成相应实例的回调函数
     * @param $abstract
     * @param null $concrete
     * @param bool $shared
     */
    public function bind($abstract, $concrete = null, $shared = false): void
    {
        if (is_null($concrete)) $concrete = $abstract;
        if (!$concrete instanceof Closure) $concrete = $this->getClosure($abstract, $concrete);
        $this->building[$abstract] = compact("concrete", "shared");
    }

    /**
     * 绑定接口和生成相应单例的回调函数
     * @param $abstract
     * @param null $concrete
     * @param bool $shared
     */
    public function singleton($abstract, $concrete = null, $shared = true): void
    {
        $this->bind($abstract, $concrete, $shared);
    }

    /**
     * 默认生成实例的回调函数
     * @param $abstract
     * @param $concrete
     * @return Closure
     */
    private function getClosure($abstract, $concrete)
    {
        return function ($c) use ($abstract, $concrete) {
            $method = ($abstract == $concrete) ? 'build' : 'make';
            return $c->$method($concrete);
        };
    }

    /**
     * @param $abstract
     * @return mixed|object
     * @throws Exception
     */
    public function make($abstract)
    {
        $concrete = $this->getConcrete($abstract);
        if ($this->isBuildable($concrete, $abstract)) {
            $object = $this->build($concrete);
        } else {
            $object = $this->make($concrete);
        }
        return $object;
    }

    /**
     * 获取绑定的回调函数
     * @param $abstract
     * @return mixed
     */
    private function getConcrete($abstract)
    {
        if (!isset($this->building[$abstract])) {
            return $abstract;
        }
        return $this->building[$abstract]['concrete'];
    }

    /**
     * @param $concrete
     * @param $abstract
     * @return bool
     */
    private function isBuildable($concrete, $abstract)
    {
        return $concrete === $abstract || $concrete instanceof Closure;
    }

    /**
     * 实例化对象
     * @param $concrete
     * @return mixed|object
     * @throws ReflectionException|Exception
     */
    private function build($concrete)
    {
        if ($concrete instanceof Closure) {
            return $concrete($this);
        }
        $reflector = new ReflectionClass($concrete);
        if (!$reflector->isInstantiable()) {
            throw new Exception('error.');
        }
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            return new $concrete;
        }
        $dependencies = $constructor->getParameters();
        $instance = $this->getDependencies($dependencies);
        return $reflector->newInstanceArgs($instance);
    }

    /**
     * 解决通过反射机制实例化对象时的依赖
     * @param array $dependencies
     * @return array
     * @throws Exception
     */
    private function getDependencies(array $dependencies)
    {
        $results = [];
        foreach ($dependencies as $dependency) {
            $results[] = is_null($dependency->getClass())
                ? $this->resolvedNonClass($dependency)
                : $this->resolvedClass($dependency);
        }
        return $results;
    }

    /**
     * @param ReflectionParameter $parameter
     * @return mixed
     * @throws Exception
     */
    private function resolvedNonClass(ReflectionParameter $parameter)
    {
        if ($parameter->isDefaultValueAvailable()) {
            return $parameter->getDefaultValue();
        }
        throw new Exception('error_one.');

    }

    /**
     * @param ReflectionParameter $parameter
     * @return mixed|object
     * @throws Exception
     */
    private function resolvedClass(ReflectionParameter $parameter)
    {
        return $this->make($parameter->getClass()->name);
    }
}