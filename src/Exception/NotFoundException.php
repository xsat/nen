<?php

namespace Nen\Exception;

/**
 * Class NotFoundException
 */
class NotFoundException extends Exception
{
    /**
     * NotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct($message, 404);
    }
}
