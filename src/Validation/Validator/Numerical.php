<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Numerical
 */
class Numerical extends Validator
{
    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());
        return preg_match('/^-?\d+\.?\d*$/', $value);
    }
}
