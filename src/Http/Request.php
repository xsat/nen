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
     * @var array
     */
    private $headers = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->headers = $this->getHeaders();
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        if (function_exists('getallheaders')) {
            $headers = getallheaders();
        } elseif (function_exists('http_get_request_headers')) {
            $headers = http_get_request_headers();
        } else {
            $headers = [];
        }

        $contentHeaders = [
            'CONTENT_TYPE' => 'Content-Type',
            'CONTENT_LENGTH' => 'Content-Length',
            'CONTENT_MD5' => 'Content-MD5'
        ];

        foreach ($_SERVER as $name => $value) {
            if (preg_match('#^HTTP_(.*)$#isu', $name, $match)) {
                $name = str_replace('_', ' ', $match[1]);
                $name = strtolower($name);
                $name = ucwords($name);
                $name = str_replace(' ', '-', $name);

                $headers[$name] = $value;
            } elseif (isset($contentHeaders[$name])) {
                $headers[$contentHeaders[$name]] = $value;
            }
        }

        return $headers;
    }

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
     * Checks whether $headers has certain index
     *
     * @param string $name
     * @return bool
     */
    public function hasHeader(string $name): bool
    {
        return isset($this->headers[$name]);
    }

    /**
     * Gets variable from $_REQUEST
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function get(string $name = null, $defaultValue = null)
    {
        return !$name ? $_REQUEST : $_REQUEST[$name] ?? null;
    }

    /**
     * Gets variable from $_POST
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getPost(string $name = null, $defaultValue = null)
    {
        return !$name ? $_POST : $_POST[$name] ?? null;
    }

    /**
     * Gets variable from $_GET
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getQuery(string $name = null, $defaultValue = null)
    {
        return !$name ? $_GET : $_GET[$name] ?? null;
    }

    /**
     * Gets variable from $_PUT
     *
     * @param string $name
     * @param mixed $defaultValue
     *
     * @return mixed
     */
    public function getPut(string $name = null, $defaultValue = null)
    {
        $content = $this->getContent();

        return !$name ? $content : $content[$name] ?? null;
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
     * Gets variable from $headers
     *
     * @param string|null $name
     * @param null $default
     *
     * @return mixed
     */
    public function getHeader(string $name = null, $default = null)
    {
        return !$name ? $this->headers : $this->headers[$name] ?? null;
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
