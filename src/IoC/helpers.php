<?php
/**
 * @param string $concrete
 * @return object
 * @throws ReflectionException
 */
function make($concrete)
{
    $reflector = new ReflectionClass($concrete);
    $constructor = $reflector->getConstructor();
    if (is_null($constructor)) return $reflector->newInstance();
    $dependencies = $constructor->getParameters();
    $instances = getDependencies($dependencies);
    return $reflector->newInstanceArgs($instances);
}

/**
 * @param array $params
 * @return array
 * @throws ReflectionException
 */
function getDependencies($params)
{
    $dependencies = [];
    foreach ($params as $param) {
        if ($param instanceof ReflectionParameter) {
            if ($param->getClass()) {
                $dependencies[] = make($param->getClass()->name);
            }
        }
    }
    return $dependencies;
}
