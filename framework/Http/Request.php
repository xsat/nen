<?php

namespace Nen\Http;

/**
 * Class Request
 */
class Request implements RequestInterface
{
    /**
     * Available methods
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PUT = 'PUT';
    public const METHOD_DELETE = 'DELETE';

    /**
     * Checks whether $_REQUEST has certain index
     *
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($_REQUEST[$name]);
    }

    /**
     * Checks whether $_POST has certain index
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasPost(string $name): bool
    {
        return isset($_POST[$name]);
    }

    /**
     * Checks whether $_GET has certain index
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasQuery(string $name): bool
    {
        return isset($_GET[$name]);
    }

    /**
     * Checks whether $_PUT has certain index
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasPut(string $name): bool
    {
        return isset($this->getContent()[$name]);
    }

    /**
     * Gets variable from $_REQUEST
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function get(string $name, $defaultValue = null)
    {
        return $_REQUEST[$name] ?? null;
    }

    /**
     * Gets variable from $_POST
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getPost(string $name, $defaultValue = null)
    {
        return $_POST[$name] ?? null;
    }

    /**
     * Gets variable from $_GET
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getQuery(string $name, $defaultValue = null)
    {
        return $_GET[$name] ?? null;
    }

    /**
     * Gets variable from $_PUT
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getPut(string $name, $defaultValue = null)
    {
        return $this->getContent()[$name] ?? null;
    }

    /**
     * @return array|null
     */
    private function getContent(): ?array
    {
        $raw = file_get_contents('php://input');
        if (!is_string($raw)) {
            return null;
        }

        $data = json_decode($raw, true);
        if (!is_array($data)) {
            return null;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        if (isset($_POST['_method'])) {
            return strtoupper($_POST['_method']);
        }

        if (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            return strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }

        if (isset($_SERVER['REQUEST_METHOD'])) {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }

        return Request::METHOD_GET;
    }
}
