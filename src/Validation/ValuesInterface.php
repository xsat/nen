<?php

namespace Nen\Validation;

/**
 * Interface ValidationInterface
 */
interface ValuesInterface
{
    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getValue(string $name);
}
