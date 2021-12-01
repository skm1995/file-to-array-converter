<?php

namespace App\Util\FileToArrayStrategy;

class CsvToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $dataRow = 0;
        $csvResult = str_getcsv($fileContent);
        foreach ($csvResult as $csvItem) {
            if (strstr($csvItem, "\r\n")) {
                $dividedString = explode("\r\n", $csvItem);
                $data[$dataRow][] = trim($dividedString[0], "'");
                $dataRow ++;
                $data[$dataRow][] = trim($dividedString[1], "'");
            } else {
                $data[$dataRow][] = trim($csvItem, "'");
            }
        }
        return $data;
    }
}
