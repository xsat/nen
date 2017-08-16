<?php

namespace Nen\Validation;

/**
 * Class Message
 */
class Message implements MessageInterface
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
     * Message constructor.
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
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
