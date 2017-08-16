<?php

namespace Nen\Validation;

/**
 * Class Validation
 */
class Validation implements ValidationInterface
{
    /**
     * @var ValidatorInterface[]
     */
    private $validators = [];

    /**
     * @var MessageInterface[]
     */
    private $messages = [];

    /**
     * Validation constructor.
     *
     * @param ValidatorInterface[] $validators
     */
    public function __construct(array $validators = [])
    {
        $this->validators = $validators;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        foreach ($this->validators as $validator) {
            if ($this->isSkip($validator, $values)) {
                continue;
            }

            if (!$validator->validate($values)) {
                $this->messages[] = $validator->getMessage();
            }
        }

        return empty($this->messages);
    }

    /**
     * @param ValidatorInterface $validator
     * @param ValuesInterface $values
     * @return bool
     */
    private function isSkip(
        ValidatorInterface $validator,
        ValuesInterface $values
    ): bool
    {
        return !$this->isEmpty($validator, $values)
            && !$validator->isRequired();
    }

    /**
     * @param ValidatorInterface $validator
     * @param ValuesInterface $values
     * @return bool
     */
    private function isEmpty(
        ValidatorInterface $validator,
        ValuesInterface $values
    ): bool
    {
        $value = $values->getValue($validator->getField());

        return $value === null || $value === '';
    }

    /**
     * @return MessageInterface[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }
}
