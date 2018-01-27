<?php

namespace Nen\Database\MySql;

/**
 * Class Query
 */
class Update extends Query
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
     * @var string
     */
    private $where;

    /**
     * Update constructor.
     *
     * @param string $table
     * @param array $columns
     * @param string $where
     * @param array $binds
     *
     * @throws QueryException
     *      - if columns are empty
     */
    public function __construct(
        string $table,
        array $columns,
        string $where = '',
        array $binds = []
    )
    {
        if (!$columns) {
            throw new QueryException('Columns are empty');
        }

        parent::__construct('', $binds);

        $this->table = $table;
        $this->columns = $columns;
        $this->where = $where;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return 'UPDATE ' . QueryHelper::quote($this->table) .
            ' SET ' . $this->getColumns() .
            $this->getWhere();
    }

    /**
     * @return string
     */
    public function getColumns(): string
    {
        $sql = '';

        foreach ($this->columns as $name => $value) {
            $sql .= QueryHelper::quote($name) .
                ' = ' .
                QueryHelper::prepare($value) .
                ', ';
        }

        return QueryHelper::trim($sql);
    }

    /**
     * @return string
     */
    public function getWhere(): string
    {
        if (!$this->where) {
            return '';
        }

        return ' WHERE ' . $this->where;
    }
}
