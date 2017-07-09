<?php

namespace Nen\Router;

/**
 * Class Routes
 */
class Routes implements RoutesInterface
{
    /**
     * @var RouteInterface[]|PrefixInterface[]
     */
    private $routes = [];

    /**
     * Routes constructor.
     *
     * @param RoutesInterface[] $routes
     */
    public function __construct(array $routes)
    {
        foreach ($routes as $route) {
            $this->addRoutes($route);
        }
    }

    /**
     * @param RoutesInterface RoutesInterface
     */
    private function addRoutes(RoutesInterface $routes): void
    {
        foreach ($routes->getRoutes() as $route) {
            $this->routes[] = $route;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
