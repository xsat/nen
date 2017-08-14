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
     * @param string $name
     * @param int $max
     * @param string $message
     */
    public function __construct(string $name, int $max, string $message)
    {
        parent::__construct($name, $message);
        $this->max = $max;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getName());
        return is_string($value) && mb_strlen($value) > $this->max;
    }
}
