<?php

namespace Nen\Exception;

/**
 * Class UnauthorizedException
 */
class UnauthorizedException extends Exception
{
    /**
     * UnauthorizedException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct($message, 401);
    }
}
