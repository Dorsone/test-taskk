<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;
use Illuminate\Support\Facades\Validator;

class ValidationRequired extends ValidationRule
{

    public function __construct(string $message = 'Validation error', array $params = [], string $type = 'error')
    {
        parent::__construct(Rules::required, $message, $params, $type);
    }

    public function validate($value, $nameOfField = 'field'): void
    {
        Validator::validate([$nameOfField => $value], [$nameOfField => 'required'.$this->getFormattedParams()], ["$nameOfField.required" => $this->message]);
    }
}
