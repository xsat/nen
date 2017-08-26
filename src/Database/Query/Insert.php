<?php

namespace Nen\Database\Query;

/**
 * Class Insert
 */
class Insert extends Query
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var array
     */
    private $columns = [];

    /**
     * Insert constructor.
     *
     * @param string $table
     * @param array $columns
     * @param array $binds
     *
     * @throws QueryException
     *      - if columns are empty
     */
    public function __construct(
        string $table,
        array $columns,
        array $binds = []
    )
    {
        if (!$columns) {
            throw new QueryException('Columns are empty');
        }

        parent::__construct('', $binds);

        $this->table = $table;
        $this->columns = $this->check($columns);
    }

    /**
     * @param $columns
     * @return array
     */
    private function check(array $columns): array
    {
        if (!is_array(current($columns))) {
            return [$columns];
        }

        return $columns;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return 'INSERT INTO ' . QueryHelper::quote($this->table) .
            $this->getFields() .
            ' VALUES ' . $this->getValues();
    }

    /**
     * @return string
     */
    private function getFields(): string
    {
        $sql = '';

        foreach (array_keys(current($this->columns)) as $field) {
            $sql .= QueryHelper::quote($field) . ', ';
        }

        return ' (' . QueryHelper::trim($sql) . ') ';
    }

    /**
     * @return string
     */
    private function getValues(): string
    {
        $sql = '';

        foreach ($this->columns as $values) {
            $inner = '';

            foreach ($values as $value) {
                $inner .= QueryHelper::prepare($value) . ', ';
            }

            $sql .= '(' . QueryHelper::trim($inner) . '), ';
        }

        return QueryHelper::trim($sql);
    }
}
