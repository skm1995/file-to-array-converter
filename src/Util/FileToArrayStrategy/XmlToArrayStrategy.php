<?php

namespace App\Util\FileToArrayStrategy;

class XmlToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $iteration = 0;
        $xmlResult = simplexml_load_string($fileContent);
        foreach ($xmlResult as $xmlData) {
            $xmlDataArray = get_object_vars($xmlData);
            if ($iteration == 0) {
                $data[] = array_keys($xmlDataArray);
            }
            $data[] = array_values($xmlDataArray);
            $iteration ++;
        }
        return $data;
    }
}
