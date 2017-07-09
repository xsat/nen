<?php

namespace Nen;

use Nen\Http\RequestInterface;
use Nen\Http\ResponseInterface;
use Nen\Router\RouteInterface;
use Nen\Router\RoutesInterface;
use RuntimeException;

/**
 * Class Dispatcher
 */
class Dispatcher implements DispatcherInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @var RouteInterface
     */
    private $route;

    /**
     * @var RoutesInterface
     */
    private $routes;

    /**
     * @var array
     */
    private $params = [];

    /**
     * Controller constructor.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param RouteInterface $route
     * @param RoutesInterface $routes
     */
    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        RouteInterface $route,
        RoutesInterface $routes
    )
    {
        $this->request = $request;
        $this->response = $response;
        $this->route = $route;
        $this->routes = $routes;
    }

    /**
     * Creates a controller and handles an action
     */
    public function dispatch(): void
    {
        $url = $this->request->get('_url');
        $this->setRouteByUrl($url);

        $controllerName = $this->getControllerName();
        $actionName = $this->getActionName();

        call_user_func_array(
            [
                new $controllerName($this->request, $this->response),
                $actionName
            ],
            $this->params
        );
    }

    /**
     * @param null|string $url
     */
    private function setRouteByUrl(?string $url): void
    {
        foreach ($this->routes->getRoutes() as $route) {
            if ((preg_match('#^/' . $route->getPattern() . '$#isu', $url, $matches) ||
                    ($route->getPattern() === null && $url === null)) &&
                $this->request->getMethod() === $route->getMethod()
            ) {
                $this->route = $route;
                if (is_array($matches)) {
                    $this->params = array_slice($matches, 1);
                }
                break;
            }
        }
    }

    /**
     * @return string
     *
     * @throws RuntimeException
     *      - if controller not found;
     */
    private function getControllerName(): string
    {
        $controller = $this->route->getController();
        if (!$controller || !class_exists($controller)) {
            throw new RuntimeException('Controller [' . $controller . '] not found');
        }

        return $controller;
    }

    /**
     * @return string
     *
     * @throws RuntimeException
     *      - if action not found
     */
    private function getActionName(): string
    {
        $controller = $this->route->getController();
        $action = $this->route->getAction() . 'Action';
        if (!method_exists($controller, $action)) {
            throw new RuntimeException('Action [' . $action . '] not found');
        }

        return $action;
    }
}
