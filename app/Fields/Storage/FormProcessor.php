<?php

namespace App\Fields\Storage;

use App\Fields\Field;

class FormProcessor
{
    /**
     * @param array<Field> $fields
     */
    public function __construct(
        protected array $fields
    )
    {
    }

    public function process()
    {
        //процесс сохранения записей
    }

    public function errors(): array|null
    {
        // возвращает массив ошибок если есть
        return null;
    }
}
