<?php

namespace App\Object;

use App\Exception\FileNotFoundException;
use App\Validator\FileValidator;

class View
{
    private array $parameters = [];

    private ?string $output = null;

    /**
     * @param string $viewFileName
     * @throws FileNotFoundException
     */
    public function setOutputByViewFileName(string $viewFileName)
    {
        $fileValidator = new FileValidator();

        $filePath = __DIR__ . '/../../views/' . strtolower($viewFileName) . '.php';
        $fileValidator->validateIfFileExists($filePath);
        $this->output = $filePath;
    }

    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Render view with parameters
     */
    public function render()
    {
        extract($this->parameters);
        include($this->output);
    }
}
