<?php

namespace Nen\Exception;

/**
 * Class Exception
 */
class Exception extends \Exception implements ExceptionInterface
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'status' => $this->getCode(),
            'message' => $this->getMessage(),
        ];
    }
}
