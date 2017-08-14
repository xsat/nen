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
     * @param string $name
     * @param int $min
     * @param string $message
     */
    public function __construct(string $name, int $min, string $message)
    {
        parent::__construct($name, $message);
        $this->min = $min;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getName());
        return is_string($value) && mb_strlen($value) < $this->min;
    }
}
