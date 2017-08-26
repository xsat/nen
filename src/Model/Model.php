<?php

namespace Nen\Model;

use Nen\Text;

/**
 * Class Model
 */
abstract class Model implements ModelInterface
{
    /**
     * Model constructor.
     *
     * @param array|null $data
     */
    public final function __construct(?array $data = null)
    {
        $this->assign($data);
    }

    /**
     * @param array|null $data
     */
    public final function assign(?array $data): void
    {
        if (!$data) {
            return;
        }

        foreach ($data as $field => $value) {
            $method = 'set' . Text::camelize($field);

            if (method_exists($this, $method)) {
                $this->{$method}($value);
            } elseif (property_exists($this, $field)) {
                $this->{$field} = $value;
            }
        }
    }
}
