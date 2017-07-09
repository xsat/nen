<?php

namespace Nen\Router;

/**
 * Class Routes
 */
class Routes implements RoutesInterface
{
    /**
     * @var RoutesInterface[]
     */
    private $routes = [];

    /**
     * Routes constructor.
     *
     * @param RoutesInterface[] $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
