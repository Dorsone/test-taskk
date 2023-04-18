<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;

class ValidationInteger extends ValidationRule
{
    public function __construct(string $message = 'Validation error', array $params = [], string $type = 'error')
    {
        parent::__construct(Rules::integer, $message, $params, $type);
    }


    function validate($value): void
    {
        // логика валидации integer
    }
}
