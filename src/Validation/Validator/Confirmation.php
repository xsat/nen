<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Confirmation
 */
class Confirmation extends Validator
{
    /**
     * @var string
     */
    private $with;

    /**
     * Confirmation constructor.
     *
     * @param string $field
     * @param string $with
     * @param string $message
     */
    public function __construct(string $field, string $with, string $message)
    {
        parent::__construct($field, $message);
        $this->with = $with;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $leftValue = $values->getValue($this->getField());
        $rightValue = $values->getValue($this->with);

        return $leftValue == $rightValue;
    }
}
