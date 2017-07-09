<?php

namespace Nen\Router;

/**
 * Interface RoutesInterface
 */
interface RoutesInterface
{
    /**
     * @return RouteInterface[]|PrefixInterface[]
     */
    public function getRoutes(): array;
}
