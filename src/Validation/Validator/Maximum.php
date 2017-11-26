<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Maximum
 */
class Maximum extends Validator
{
    /**
     * @var int
     */
    private $max;

    /**
     * Maximum constructor.
     *
     * @param string $field
     * @param int $max
     * @param string $message
     */
    public function __construct(string $field, int $max, string $message)
    {
        parent::__construct($field, $message);
        $this->max = $max;
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
            return is_string($value) && mb_strlen($value) <= $this->max;
        }

        return is_string($value) && strlen($value) <= $this->max;
    }
}
