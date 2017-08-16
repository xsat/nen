<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Range
 */
class Range extends Validator
{
    /**
     * @var array
     */
    private $range = [];

    /**
     * Range constructor.
     *
     * @param string $field
     * @param array $range
     * @param string $message
     */
    public function __construct(string $field, array $range, string $message)
    {
        parent::__construct($field, $message);
        $this->range = $range;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());
        return in_array($value, $this->range);
    }
}
