<?php

namespace Nen\Validation\Validator;

use Nen\Validation\ValuesInterface;

/**
 * Class Maximum
 */
class Regex extends Validator
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * Regex constructor.
     *
     * @param string $name
     * @param string $pattern
     * @param string $message
     */
    public function __construct(string $name, string $pattern, string $message)
    {
        parent::__construct($name, $message);
        $this->pattern = $pattern;
    }

    /**
     * @param ValuesInterface $values
     *
     * @return bool
     */
    public function validate(ValuesInterface $values): bool
    {
        $value = $values->getValue($this->getName());
        return preg_match($this->pattern, $value);
    }
}
