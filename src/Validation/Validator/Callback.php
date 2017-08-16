<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Callback
 */
class Callback extends Validator
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * Callback constructor.
     *
     * @param string $field
     * @param callable $callback
     * @param string $message
     */
    public function __construct(string $field, callable $callback, string $message)
    {
        parent::__construct($field, $message);
        $this->callback = $callback;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getField());
        return call_user_func($this->callback, $value) === true;
    }
}
