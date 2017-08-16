<?php

namespace Nen\Validation\Validator;

use Nen\Validation\Message;
use Nen\Validation\MessageInterface;
use Nen\Validation\ValidatorInterface;
use Nen\Validation\ValuesInterface;

/**
 * Class Validator
 */
abstract class Validator implements ValidatorInterface
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $message;

    /**
     * Validator constructor.
     *
     * @param string $field
     * @param string $message
     */
    public function __construct(string $field, string $message)
    {
        $this->field = $field;
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return false;
    }

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface
    {
        return new Message($this->field, $this->message);
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public abstract function validate(ValuesInterface $values): bool;
}
