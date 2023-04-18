<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;

class ValidationRequired extends ValidationRule
{

    public function __construct(string $message, array $params, string $type)
    {
        parent::__construct(Rules::required, $message, $params, $type);
    }

    public function validate()
    {
        // логика для required, если понадобится другие типы валидации то делаем всё анологично
    }
}
