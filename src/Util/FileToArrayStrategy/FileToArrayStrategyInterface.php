<?php

namespace App\Util\FileToArrayStrategy;

interface FileToArrayStrategyInterface
{
    public function convert(string $fileContent): array;
}
