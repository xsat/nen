<?php

namespace Nen\Database\Query;

/**
 * Class Select
 */
class Select extends Query
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $where;

    /**
     * Select constructor.
     *
     * @param string $table
     * @param string $where
     * @param array $binds
     */
    public function __construct(
        string $table,
        string $where = '',
        array $binds = []
    )
    {
        parent::__construct('', $binds);

        $this->table = $table;
        $this->where = $where;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return 'SELECT * ' .
            ' FROM ' . QueryHelper::quote($this->table) .
            $this->getWhere();
    }

    /**
     * @return string
     */
    private function getWhere(): string
    {
        if (!$this->where) {
            return '';
        }

        return ' WHERE ' . $this->where;
    }
}
