<?php

namespace Nen\Exception;

/**
 * Class ForbiddenException
 */
class ForbiddenException extends Exception
{
    /**
     * ForbiddenException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct($message, 403);
    }
}
