<?php

namespace Nen\Http;

/**
 * Interface RequestInterface
 */
interface RequestInterface
{
    /**
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasPost(string $name): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasQuery(string $name): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasPut(string $name): bool;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader(string $name): bool;

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function get(string $name = null, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getPost(string $name = null, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getQuery(string $name = null, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getPut(string $name = null, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getHeader(string $name = null, $default = null);

    /**
     * @return string
     */
    public function getMethod(): string;
}
