<?php

namespace App\Util\FileToArrayStrategy;

class JsonToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        $data = [];
        $decodedJson = json_decode($fileContent, true) ?: [];
        if (isset($decodedJson[0])) {
            $data[] = array_keys($decodedJson[0]);
        }
        foreach ($decodedJson as $jsonItem) {
            $data[] = array_values($jsonItem);
        }
        return $data;
    }
}
