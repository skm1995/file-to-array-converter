<?php

namespace App\Util\FileToArrayStrategy;

class XmlToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $xmlResult = simplexml_load_string($fileContent);
        foreach ($xmlResult as $xmlData) {
            $data[] = get_object_vars($xmlData);
        }
        return $data;
    }
}
