<?php

namespace Nen\Router;

/**
 * Class Group
 */
class Group implements GroupInterface
{
    /**
     * @var RouteInterface[]
     */
    private $routes = [];

    /**
     * Group constructor.
     *
     * @param RouteInterface[] $routes
     */
    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    /**
     * @return RouteInterface[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param RouteInterface $route
     *
     * @return GroupInterface
     */
    public function addRoute(RouteInterface $route): GroupInterface
    {
        $this->routes[] = $route;

        return $this;
    }
}
