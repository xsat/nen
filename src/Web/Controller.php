<?php

namespace Nen\Web;

use Nen\Http\RequestInterface;
use Nen\Http\ResponseInterface;

/**
 * Class Controller
 */
class Controller
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * Controller constructor.
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     */
    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
