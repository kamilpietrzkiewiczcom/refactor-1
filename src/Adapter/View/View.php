<?php

namespace App\Adapter\View;

class View
{
    private string $viewName; // we can use private string $viewName on the constructor
                              // but using isEqual is cleaner

    private array $data = [];

    public function __construct(string $viewName, array $data = [])
    {
        $this->viewNameEquals($viewName);
        $this->dataEquals($data);
    }

    private function viewNameEquals(string $viewName): void
    {
        $this->viewName = $viewName;
    }

    private function dataEquals(array $data): void
    {
        $this->data = $data;
    }

    public function render(): void
    {
        extract($this->data);
        require __DIR__ . '/../../../template/' . $this->viewName . '.php';
    }
}
