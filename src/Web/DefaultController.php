<?php

namespace Nen\Web;

use Nen\Exception\NotFoundException;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     * 404 page
     *
     * @throws NotFoundException
     */
    public function notFoundAction(): void
    {
        throw new NotFoundException('Page not found');
    }
}
