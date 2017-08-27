<?php

namespace Nen\Exception;

use Nen\Validation\MessageInterface;
use Nen\Validation\ValidationInterface;

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
     * @param ValidationInterface $validation
     */
    public function __construct(ValidationInterface $validation)
    {
        parent::__construct(
            $this->prepareMessages($validation->getMessages()),
            400
        );
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
