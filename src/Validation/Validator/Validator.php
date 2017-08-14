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
    private $name;

    /**
     * @var string
     */
    private $message;

    /**
     * Validator constructor.
     * @param string $name
     * @param string $message
     */
    public function __construct(string $name, string $message)
    {
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface
    {
        return new Message($this->name, $this->message);
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public abstract function validate(ValuesInterface $values): bool;
}
