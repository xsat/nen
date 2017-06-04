<?php

namespace Nen\Database\Query;

/**
 * Class Delete
 */
class Delete extends Query
{
    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $condition;

    /**
     * Delete constructor.
     *
     * @param string $table
     * @param string $condition
     * @param array $binds
     */
    public function __construct(
        string $table,
        string $condition = '',
        array $binds = []
    )
    {
        parent::__construct('', $binds);

        $this->table = $table;
        $this->condition = $condition;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return 'DELETE FROM ' . QueryHelper::quote($this->table) . $this->getWhere();
    }

    /**
     * @return string
     */
    private function getWhere(): string
    {
        if (!$this->condition) {
            return '';
        }

        return ' WHERE ' . $this->condition;
    }
}
