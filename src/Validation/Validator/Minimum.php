<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Minimum
 */
class Minimum extends Validator
{
    /**
     * @var int
     */
    private $min;

    /**
     * Minimum constructor.
     *
     * @param string $field
     * @param int $min
     * @param string $message
     */
    public function __construct(string $field, int $min, string $message)
    {
        parent::__construct($field, $message);
        $this->min = $min;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());

        if (function_exists('mb_strlen')) {
            return is_string($value) && mb_strlen($value) >= $this->min;
        }

        return is_string($value) && strlen($value) >= $this->min;
    }
}
