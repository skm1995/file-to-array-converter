<?php

namespace App\Validator;

use App\Exception\FileExtensionNotSupportedException;
use App\Exception\FileNotFoundException;
use App\Exception\InvalidFileNameException;

class FileValidator
{
    /**
     * @param string $filePath
     * @throws FileNotFoundException
     */
    public function validateIfFileExists(string $filePath)
    {
        if (! file_exists($filePath)) {
            throw new FileNotFoundException("File $filePath not found!");
        }
    }

    /**
     * @throws FileExtensionNotSupportedException
     * @throws InvalidFileNameException
     */
    public function validateExtension(string $extension)
    {
        $supportedExtensions = explode(',', getenv('supported_extensions')) ?: [];
        if (! in_array($extension, $supportedExtensions)) {
            throw new FileExtensionNotSupportedException("File extension: $extension is not supported.");
        }
    }
}
