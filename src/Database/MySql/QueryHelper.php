<?php

namespace Nen\Database\MySql;

use Nen\Database\QueryHelper as ParentQueryHelper;

/**
 * Class QueryHelper
 */
class QueryHelper extends ParentQueryHelper
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
}
