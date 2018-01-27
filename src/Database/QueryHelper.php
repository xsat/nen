<?php

namespace Nen\Database;

/**
 * Class QueryHelper
 */
class QueryHelper
{
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
            return '"' . $value . '"';
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
