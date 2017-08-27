<?php

namespace Nen\Exception;

use Nen\Validation\MessageInterface;

/**
 * Class ValidationException
 */
class ValidationException extends Exception
{
    /**
     * @var array
     */
    private $messages = [];

    /**
     * ValidationException constructor.
     *
     * @param MessageInterface[] $messages
     */
    public function __construct(array $messages = [])
    {
        parent::__construct($this->prepareMessages($messages), 400);
    }

    /**
     * @param MessageInterface[] $messages
     *
     * @return string
     */
    private function prepareMessages(array $messages): string
    {
        $simple_messages = [];

        foreach ($messages as $message) {
            $this->messages[] = [
                'field' => $message->getField(),
                'messages' => $message->getMessage(),
            ];

            $simple_messages[] = $message->getMessage();
        }

        return implode(', ', $simple_messages);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'status' => $this->getCode(),
            'messages' => $this->messages,
        ];
    }
}
