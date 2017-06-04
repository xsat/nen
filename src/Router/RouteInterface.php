<?php

namespace Nen\Router;

/**
 * Interface RouteInterface
 */
interface RouteInterface
{
    /**
     * @return null|string
     */
    public function getController(): ?string;

    /**
     * @return null|string
     */
    public function getAction(): ?string;

    /**
     * @return null|string
     */
    public function getPattern(): ?string;

    /**
     * @return string
     */
    public function getMethod(): string;
}
