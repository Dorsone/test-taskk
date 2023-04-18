<?php

namespace App\Fields\Storage;

use App\Fields\Field;

class FieldStorage
{
    public function __construct(
        protected Field $field
    )
    {
    }

    public function store()
    {
        // логика сохранения полей
    }

    public function errors(): array|null
    {
        // возвращает массив ошибок если есть
        return null;
    }
}
