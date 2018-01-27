<?php

namespace Nen\Database;

/**
 * Interface QueryInterface
 */
interface QueryInterface
{
    /**
     * @return string
     */
    public function getQuery(): string;

    /**
     * @return array
     */
    public function getBinds(): array;
}
