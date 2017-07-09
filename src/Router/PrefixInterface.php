<?php

namespace Nen\Router;

/**
 * Interface PrefixInterface
 */
interface PrefixInterface
{
    /**
     * @param string $prefix
     */
    public function addPrefix(string $prefix): void;
}
