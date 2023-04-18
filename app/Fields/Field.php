<?php

namespace App\Fields;

use App\Fields\Storage\FieldStorage;
use App\Fields\Validators\Rules\ValidationRule;
use Illuminate\Validation\ValidationException;

class Field
{
    /**
     * @param int $id
     * @param mixed $value
     * @param array $validation
     * @param string $label
     */
    public function __construct(
        public int $id,
        public mixed $value,
        public array $validation,
        public string $label,
    )
    {
    }
}
