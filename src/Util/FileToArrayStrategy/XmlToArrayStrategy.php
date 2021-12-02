<?php

namespace App\Util\FileToArrayStrategy;

class XmlToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $xmlResult = simplexml_load_string($fileContent);
        foreach ($xmlResult as $xmlData) {
            $fields = get_object_vars($xmlData);
            foreach ($fields as &$field) {
                if (is_numeric($field)) {
                    $field = (int)$field;
                }
            }
            $data[] = $fields;
        }
        return $data;
    }
}
