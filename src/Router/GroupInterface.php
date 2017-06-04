<?php

namespace Nen\Router;

/**
 * Interface GroupInterface
 */
interface GroupInterface
{
    /**
     * @return RouteInterface[]
     */
    public function getRoutes(): array;

    /**
     * @param RouteInterface $route
     *
     * @return GroupInterface
     */
    public function addRoute(RouteInterface $route): GroupInterface;
}
