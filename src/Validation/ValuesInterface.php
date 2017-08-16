<?php

namespace Nen\Validation;

/**
 * Interface ValidationInterface
 */
interface ValuesInterface
{
    /**
     * @param string $field
     *
     * @return mixed
     */
    public function getValue(string $field);
}
