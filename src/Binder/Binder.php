<?php

namespace Nen\Binder;

use Nen\Text;
use Nen\Validation\ValuesInterface;

/**
 * Class Binder
 */
abstract class Binder implements ValuesInterface
{
    /**
     * Binder constructor.
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
    private function assign(?array $data): void
    {
        if (!$data) {
            return;
        }

        foreach ($data as $field => $value) {
            $method = 'set' . Text::camelize($field);

            if (method_exists($this, $method)) {
                $this->{$method}($value);
            }
        }
    }

    /**
     * @param string $field
     *
     * @return mixed
     */
    public final function getValue(string $field)
    {
        $method = 'get' . Text::camelize($field);

        if (!method_exists($this, $method)) {
            return null;
        }

        return $this->{$method}();
    }
}
