<?php

namespace App\Validator;

use App\Exception\FileNotFoundException;

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
}
