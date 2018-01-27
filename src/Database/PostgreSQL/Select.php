<?php

namespace Nen\Database\PostgreSQL;

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
    private $fields;

    /**
     * @var string
     */
    private $where;

    /**
     * Select constructor.
     *
     * @param string $table
     * @param string $fields
     * @param string $where
     * @param array $binds
     */
    public function __construct(
        string $table,
        string $fields,
        string $where = '',
        array $binds = []
    )
    {
        parent::__construct('', $binds);

        $this->table = $table;
        $this->fields = $fields;
        $this->where = $where;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return 'SELECT ' . $this->fields .
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
