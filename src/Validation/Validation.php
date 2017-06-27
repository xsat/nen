<?php

namespace Nen\Validation;

use Nen\Validation\Validator\ValidatorInterface;

/**
 * Class Validation
 */
class Validation implements ValidationInterface
{
    /**
     * Validation constructor.
     *
     * @param ValidatorInterface[] $validators
     */
    public function __construct(array $validators = [])
    {
    }
}
