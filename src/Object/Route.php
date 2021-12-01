<?php

namespace App\Object;

/**
 * Single route class
 */
class Route
{
    private string $name;

    private string $path;

    private string $controller;

    private string $action;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Route
    {
        $this->name = $name;
        return $this;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): Route
    {
        $this->path = $path;
        return $this;
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function setController(string $controller): Route
    {
        $this->controller = $controller;
        return $this;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): Route
    {
        $this->action = $action;
        return $this;
    }
}
