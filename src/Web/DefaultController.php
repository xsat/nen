<?php

namespace Nen\Web;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * 404 page
     */
    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
        $this->response->setContent('Page not found');
    }
}
