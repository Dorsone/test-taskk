<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;
use Illuminate\Validation\ValidationException;

abstract class ValidationRule
{
    public function __construct(
        protected Rules $name,
        protected string $message = 'Validation error',
        protected array $params = [],
        protected string $type = 'error',
    )
    {
    }

    /**
     *
     * @throws ValidationException
     * @param $value
     * @return void
     */
    abstract function validate($value): void;
}
