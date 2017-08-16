<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Presence
 */
class Presence extends Validator
{
    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return true;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());
        return $value !== null && $value !== '' && $value !== [];
    }
}
