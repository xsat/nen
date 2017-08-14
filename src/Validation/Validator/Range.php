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
     * @param string $name
     * @param array $range
     * @param string $message
     */
    public function __construct(string $name, array $range, string $message)
    {
        parent::__construct($name, $message);
        $this->range = $range;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getName());
        return in_array($value, $this->range);
    }
}
