<?php

namespace App\Util;

use App\Exception\FileExtensionNotSupportedException;
use App\Exception\FileNotFoundException;
use App\Exception\InvalidFileNameException;
use App\Exception\NotImplementedException;
use App\Util\FileToArrayStrategy\CsvToArrayStrategy;
use App\Util\FileToArrayStrategy\JsonToArrayStrategy;
use App\Util\FileToArrayStrategy\XmlToArrayStrategy;
use App\Validator\FileValidator;

class FileToArrayConverterLoader
{
    /**
     * @throws NotImplementedException
     * @throws FileExtensionNotSupportedException
     * @throws FileNotFoundException
     * @throws InvalidFileNameException
     */
    public function getFileToArrayConverterByFileName(string $fileName): FileToArrayConverter
    {
        $fileValidator = new FileValidator();
        $fileInfoGetter = new FileInfoGetter();

        $fileExtension = $fileInfoGetter->getExtension($fileName);
        $fileValidator->validateExtension($fileExtension);
        $filePath = __DIR__ . '/../../public/files/' . $fileName;
        $fileValidator->validateIfFileExists($filePath);

        switch ($fileExtension) {
            case 'csv':
                $strategy = new CsvToArrayStrategy();
                break;
            case 'json':
                $strategy = new JsonToArrayStrategy();
                break;
            case 'xml':
                $strategy = new XmlToArrayStrategy();
                break;
            default:
                throw new NotImplementedException("Strategy not implemented for extension: $fileExtension");
        }

        return new FileToArrayConverter($strategy, file_get_contents($filePath));
    }
}
