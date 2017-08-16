<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Alnum
 */
class Alnum extends Validator
{
    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());
        return ctype_alnum($value);
    }
}
