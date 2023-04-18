<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;
use Illuminate\Support\Facades\Validator;

class ValidationRegex extends ValidationRule
{
    public function __construct(string $message = 'Validation error', array $params = [], string $type = 'error')
    {
        parent::__construct(Rules::integer, $message, $params, $type);
    }


    function validate($value, $nameOfField = 'field'): void
    {
        Validator::validate([$nameOfField => $value], [$nameOfField => 'regex'], ["$nameOfField.required" => $this->message]);
    }
}
