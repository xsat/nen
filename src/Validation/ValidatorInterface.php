<?php

namespace Nen\Validation;

/**
 * Interface ValidatorInterface
 */
interface ValidatorInterface
{
    /**
     * @return bool
     */
    public function isRequired(): bool;

    /**
     * @return string
     */
    public function getField(): string;

    /**
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface;

    /**
     * @param ValuesInterface
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool;
}
