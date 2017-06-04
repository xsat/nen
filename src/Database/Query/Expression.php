<?php

namespace Nen\Database\Query;

/**
 * Class Expression
 */
class Expression
{
    /**
     * @var string
     */
    private $expression;

    /**
     * Expression constructor.
     *
     * @param string $expression
     */
    public function __construct(string $expression)
    {
        $this->expression = $expression;
    }

    /**
     * String magic method
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->expression;
    }
}
