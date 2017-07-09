<?php

namespace Nen\Router;

/**
 * Class Group
 */
class Group implements RoutesInterface
{
    /**
     * @var RoutesInterface
     */
    private $routes = [];

    /**
     * Group constructor.
     *
     * @param string $prefix
     * @param RoutesInterface $routes
     */
    public function __construct(string $prefix, RoutesInterface $routes)
    {
        $this->routes = $routes;

        $this->addPrefix($prefix);
    }

    /**
     * @param string $prefix
     */
    private function addPrefix(string $prefix): void
    {
        foreach ($this->routes->getRoutes() as $route) {
            $route->addPrefix($prefix);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes(): array
    {
        return $this->routes->getRoutes();
    }
}
