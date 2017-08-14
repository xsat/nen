<?php

namespace Nen\Validation;

/**
 * Class Values
 */
class Values implements ValuesInterface
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * Values constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getValue(string $name)
    {
        return $this->data[$name] ?? null;
    }
}
