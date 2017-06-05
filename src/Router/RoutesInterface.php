<?php

namespace Nen\Router;

/**
 * Interface RoutesInterface
 */
interface RoutesInterface extends PrefixInterface
{
    /**
     * @return RouteInterface[]
     */
    public function getRoutes(): array;
}
