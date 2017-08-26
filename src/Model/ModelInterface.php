<?php

namespace Nen\Model;

/**
 * Interface ModelInterface
 */
interface ModelInterface
{
    /**
     * @param array|null $data
     */
    public function assign(?array $data): void;
}
