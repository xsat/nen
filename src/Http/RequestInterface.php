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
     * @param mixed $default
     *
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getPost(string $name, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getQuery(string $name, $default = null);

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getPut(string $name, $default = null);

    /**
     * @return int
     */
    public function getMethod(): string;
}
