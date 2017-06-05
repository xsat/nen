<?php

namespace Nen\Router;

/**
 * Class Groups
 */
class Groups implements RoutesInterface
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var RoutesInterface[]
     */
    private $routes = [];

    /**
     * Groups constructor.
     *
     * @param null|string $prefix
     * @param RoutesInterface[] $routes
     */
    public function __construct(?string $prefix, array $routes = [])
    {
        $this->prefix = $prefix;
        $this->routes = $routes;
    }

    /**
     * @return RouteInterface[]
     */
    public function getRoutes(): array
    {
        $routes = [];

        foreach ($this->routes as $route) {
            $route->setPrefix($this->prefix);

            $routes = array_merge(
                $routes,
                $route->getRoutes()
            );
        }

        return $routes;
    }

    /**
     * @param null|string $prefix
     */
    public function setPrefix(?string $prefix)
    {
        $this->prefix = $prefix;
    }
}
