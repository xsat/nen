<?php

namespace Nen;

use Nen\Web\DefaultController;
use Nen\Http\ContentInterface;
use Nen\Http\Request;
use Nen\Http\RequestInterface;
use Nen\Http\Response;
use Nen\Http\ResponseInterface;
use Nen\Router\GroupInterface;
use Nen\Router\Route;
use Exception;

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
     * @param GroupInterface $group
     */
    public function __construct(GroupInterface $group)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->dispatcher = new Dispatcher(
            $this->request,
            $this->response,
            new Route(DefaultController::class, 'notFound', ''),
            $group
        );
    }

    /**
     * Run Nenlication
     */
    public function run()
    {
        try {
            $this->dispatcher->dispatch();

            echo $this->response->getContent();
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
