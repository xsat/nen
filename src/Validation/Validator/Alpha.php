<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Alpha
 */
class Alpha extends Validator
{
    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getName());
        return ctype_alpha($value);
    }
}
