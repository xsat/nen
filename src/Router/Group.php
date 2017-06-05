<?php

namespace Nen\Router;

/**
 * Class Group
 */
class Group implements RoutesInterface
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var RouteInterface[]
     */
    private $routes = [];

    /**
     * Group constructor.
     *
     * @param null|string $prefix
     * @param RouteInterface[] $routes
     */
    public function __construct(?string $prefix, array $routes = [])
    {
        $this->prefix = $prefix;
        $this->routes = $routes;

        $this->updatePrefix();
    }

    /**
     * @param null|string $prefix
     */
    public function setPrefix(?string $prefix)
    {
        if ($prefix && $this->prefix) {
            $this->prefix .= '/' . $prefix;
        } elseif ($prefix) {
            $this->prefix = $prefix;
        }
    }

    /**
     * Sets prefix in all routes
     */
    private function updatePrefix()
    {
        foreach ($this->routes as $route) {
            $route->setPrefix($this->prefix);
        }
    }

    /**
     * @return RouteInterface[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
