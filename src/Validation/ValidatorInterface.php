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
    public function getName(): string;

    /**
     * @return MessageInterface
     */
    public function getMessage(): MessageInterface;

    /**
     * @return bool
     */
    public function validate(ValuesInterface $values): bool;
}
