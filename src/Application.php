<?php

namespace Nen;

use Exception;
use Nen\Http\ContentInterface;
use Nen\Http\Request;
use Nen\Http\RequestInterface;
use Nen\Http\Response;
use Nen\Http\ResponseInterface;
use Nen\Router\Route;
use Nen\Router\RoutesInterface;
use Nen\Web\DefaultController;

/**
 * Class Application
 */
class Application
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface|ContentInterface
     */
    private $response;

    /**
     * @var DispatcherInterface
     */
    private $dispatcher;

    /**
     * Application constructor.
     *
     * @param RoutesInterface $routes
     */
    public function __construct(RoutesInterface $routes)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->dispatcher = new Dispatcher(
            $this->request,
            $this->response,
            new Route(DefaultController::class, 'notFound', ''),
            $routes
        );
    }

    /**
     * Run application
     */
    public function run(): void
    {
        try {
            $this->dispatcher->dispatch();

            echo $this->response->getContent();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
