<?php

namespace Nen\Router;

use Nen\Http\Request;

/**
 * Class Route
 */
class Route implements RouteInterface
{
    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $method = Request::METHOD_GET;

    /**
     * Route constructor.
     * @param null|string $controller
     * @param null|string $action
     * @param null|string $pattern
     * @param null|string $method
     */
    public function __construct(
        ?string $controller = null,
        ?string $action = null,
        ?string $pattern = null,
        ?string $method = null
    )
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->pattern = $pattern;
        $this->method = $method ?? $this->method;
    }

    /**
     * @return null|string
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * @return null|string
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @return null|string
     */
    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}
