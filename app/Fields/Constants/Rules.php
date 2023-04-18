<?php

namespace App\Fields\Constants;

use App\Fields\Validators\Rules\ValidationInteger;
use App\Fields\Validators\Rules\ValidationRequired;
use Exception;

enum Rules: string
{
    case required = 'required';
    case integer = 'integer';

    /**
     * @throws Exception
     */
    public function getValidator(): ValidationRequired
    {
        return match ($this->value) {
            'required' => new ValidationRequired(),
            'integer' => new ValidationInteger(),
            'default' => throw new Exception('Undefined validation rule')
        };
    }
}
