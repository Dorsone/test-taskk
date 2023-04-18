<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;

abstract class ValidationRule
{
    public function __construct(
        protected Rules $name,
        protected string $message,
        protected array $params,
        protected string $type,
    )
    {
    }

    abstract function validate();
}
