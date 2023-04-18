<?php

namespace App\DTO;

use Illuminate\Support\Collection;

class ValidationValue
{
    public function __construct(
        protected Collection $items
    )
    {
        //проверка структуры колекции и тд
    }

    public function collect(): Collection
    {
        return $this->items;
    }
}
