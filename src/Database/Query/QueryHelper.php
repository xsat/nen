<?php

namespace Nen\Database\Query;

use Nen\Database\Connection;

/**
 * Class QueryHelper
 */
class QueryHelper
{
    /**
     * @param string $string
     *
     * @return string
     */
    public static function quote(string $string): string
    {
        return '`' . $string . '`';
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public static function prepare($value)
    {
        if (is_a($value, Expression::class)) {
            return (string)$value;
        } elseif (is_string($value)) {
            return Connection::getInstance()->getPDO()->quote($value);
        } elseif (is_bool($value)) {
            return (int)$value;
        }

        return $value;
    }

    /**
     * @param string $string
     * @param string $suffix
     *
     * @return string
     */
    public static function trim(string $string, string $suffix = ', '): string
    {
        return rtrim($string, $suffix);
    }
}
