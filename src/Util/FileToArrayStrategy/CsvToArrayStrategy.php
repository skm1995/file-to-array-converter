<?php

namespace App\Util\FileToArrayStrategy;

class CsvToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $lines = explode( "\r\n", $fileContent);
        $headers = str_getcsv(array_shift($lines ));
        foreach ($lines as $line ) {
            if (empty($line)) {
                continue;
            }
            $row = [];
            foreach (str_getcsv($line) as $lineKey => $field) {
                $field = trim($field, "'");
                $field = is_numeric($field) ? (int)$field : $field;
                $row[trim($headers[$lineKey], "'")] = $field;
            }
            $data[] = $row;
        }
        return $data;
    }
}
