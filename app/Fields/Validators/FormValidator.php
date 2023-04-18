<?php

namespace App\Fields\Validators;

use App\Fields\Field;

class FormValidator
{
    /**
     * @param array<Field> $fields
     */
    public function __construct(
        protected array $fields
    )
    {
    }

    public function validate()
    {
        // для валидации гупп полей
    }

    public function errors(): array|null
    {
        // возвращает массив ошибок если есть
        return null;
    }
}
