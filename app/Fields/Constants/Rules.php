<?php

namespace App\Fields\Constants;

use App\Fields\Validators\Rules\ValidationAddress;
use App\Fields\Validators\Rules\ValidationInteger;
use App\Fields\Validators\Rules\ValidationNumber;
use App\Fields\Validators\Rules\ValidationRegex;
use App\Fields\Validators\Rules\ValidationRequired;
use App\Fields\Validators\Rules\ValidationRule;
use Exception;

enum Rules: string
{
    case required = 'required';
    case integer = 'integer';
    case number = 'number';
    case regex = 'regex';
    case address = 'address';

    /**
     * @throws Exception
     */
    public function getValidator(): ValidationRule
    {
        return match ($this->value) {
            'required' => new ValidationRequired(),
            'integer' => new ValidationInteger(),
            'number' => new ValidationNumber(),
            'regex' => new ValidationRegex(),
            'address' => new ValidationAddress(),
            'default' => throw new Exception('Undefined validation rule')
        };
    }
}
