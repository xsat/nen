<?php

namespace Nen\Validation;

/**
 * Interface ValidationInterface
 */
interface ValidationInterface
{
    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool;

    /**
     * @return array
     */
    public function getMessages(): array;
}
