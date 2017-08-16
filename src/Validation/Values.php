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
     * @param string $field
     *
     * @return mixed
     */
    public function getValue(string $field)
    {
        return $this->data[$field] ?? null;
    }
}
