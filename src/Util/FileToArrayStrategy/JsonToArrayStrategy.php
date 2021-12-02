<?php

namespace App\Util\FileToArrayStrategy;

class JsonToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        return json_decode($fileContent, true) ?: [];
    }
}
