<?php

namespace App\Util\FileToArrayStrategy;

class XmlToArrayStrategy implements FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array
    {
        return [];
    }
}
