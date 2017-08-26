<?php

namespace Nen;

/**
 * Class Text
 */
class Text
{
    /**
     * @param string $text
     * @param string|null $delimiter
     *
     * @return string
     */
    public static function camelize(
        string $text,
        string $delimiter = '_'
    ): string
    {
        return str_replace(' ', '', ucwords(str_replace($delimiter, ' ', $text)));
    }
}
