<?php

namespace Nen\Validation;

/**
 * Interface MessageInterface
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getMessage(): string;
}
