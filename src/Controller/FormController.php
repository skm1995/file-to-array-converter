<?php

namespace App\Controller;

use App\Exception\FileNotFoundException;

class FormController extends AbstractController
{
    /**
     * Renders form.
     *
     * @throws FileNotFoundException
     */
    public function index()
    {
        $this->renderView('form');
    }
}
