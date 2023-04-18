<?php

namespace App\Fields\Validators;

use App\Fields\Field;

class FieldValidator
{
    public function __construct(
        protected Field $field
    )
    {
    }

    public function validate(){
        // для валидации одного поля
    }

    public function errors(): array|null
    {
        // возвращает массив ошибок если есть
        return null;
    }
}
