<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Identical
 */
class Identical extends Validator
{
    /**
     * @var string
     */
    private $accepted;

    /**
     * Identical constructor.
     *
     * @param string $field
     * @param string $accepted
     * @param string $message
     */
    public function __construct(string $field, string $accepted, string $message)
    {
        parent::__construct($field, $message);
        $this->accepted = $accepted;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());

        return $value == $this->accepted;
    }
}
