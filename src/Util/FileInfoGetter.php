<?php

namespace App\Util;

use App\Exception\InvalidFileNameException;

class FileInfoGetter
{
    /**
     * @param string $fileName
     * @return string
     * @throws InvalidFileNameException
     */
    public function getExtension(string $fileName): string
    {
        $filenameParts = explode('.', $fileName);
        if (! count($filenameParts)) {
            throw new InvalidFileNameException('Invalid file name.');
        }
        return end($filenameParts);
    }
}
