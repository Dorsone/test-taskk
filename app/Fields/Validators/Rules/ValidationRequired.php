<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;

class ValidationRequired extends ValidationRule
{

    public function __construct(string $message = 'Validation error', array $params =[], string $type = 'error')
    {
        parent::__construct(Rules::required, $message, $params, $type);
    }

    public function validate($value): void
    {
        // логика для required, если понадобится другие типы валидации то делаем всё анологично
    }
}
