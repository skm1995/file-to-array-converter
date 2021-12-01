<?php

namespace App\Util;

use App\Util\FileToArrayStrategy\FileToArrayStrategyInterface;

class FileToArrayConverter
{
    private FileToArrayStrategyInterface $strategy;

    private string $fileContent;

    public function __construct(FileToArrayStrategyInterface $strategy, string $fileContent)
    {
        $this->strategy = $strategy;
        $this->fileContent = $fileContent;
    }

    public function getArray(): array
    {
        return $this->strategy->convert($this->fileContent);
    }
}
