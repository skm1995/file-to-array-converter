<?php

namespace App\Controller;

use App\Enum\CsrfIntentionEnum;
use App\Exception\FileExtensionNotSupportedException;
use App\Exception\FileNotFoundException;
use App\Exception\InvalidCsrfTokenException;
use App\Exception\InvalidFileNameException;
use App\Exception\InvalidInputException;
use App\Exception\NotImplementedException;
use App\Util\CsrfValidator;
use App\Util\FileToArrayConverterLoader;
use App\Validator\InputValidator;

class FormController extends AbstractController
{
    /**
     * Renders form.
     *
     * @throws FileNotFoundException
     */
    public function index()
    {
        $this->renderView('form', [
            'possibleExtensionsString' => ! empty(getenv('supported_extensions')) ? getenv('supported_extensions') : 'none'
        ]);
    }

    /**
     * @throws FileNotFoundException
     * @throws InvalidInputException
     * @throws FileExtensionNotSupportedException
     * @throws InvalidFileNameException
     * @throws NotImplementedException
     * @throws InvalidCsrfTokenException
     */
    public function process()
    {
        $csrfValidator = new CsrfValidator();
        $csrfValidator->validateToken($_POST['csrf'], CsrfIntentionEnum::PROCESS_FORM);

        $inputValidator = new InputValidator();
        $fileToArrayConverterLoader = new FileToArrayConverterLoader();

        $fileName = $_POST['filename'] ?? null;
        $inputValidator->validate($fileName);
        $fileToArrayConverter = $fileToArrayConverterLoader->getFileToArrayConverterByFileName($fileName);

        $this->renderView('output', [
            'items' => $fileToArrayConverter->getArray()
        ]);
    }
}
