<?php

namespace App\Controller;

use App\Exception\FileNotFoundException;
use App\Object\View;

abstract class AbstractController
{
    /**
     * Render view by file name
     *
     * @throws FileNotFoundException
     */
    protected function renderView(string $viewFileName, array $parameters = [])
    {
        $view = new View();
        $view->setOutputByViewFileName($viewFileName);
        $view->setParameters($parameters);
        $view->render();
    }
}
