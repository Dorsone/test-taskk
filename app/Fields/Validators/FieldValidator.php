<?php

namespace App\Fields\Validators;

use App\Fields\Constants\Rules;
use App\Fields\Field;
use Exception;

class FieldValidator
{
    public function __construct(
        protected Field $field
    )
    {
    }

    protected array $errors = [];

    public function validate(): bool
    {
        try {
            foreach ($this->field->validation as $rule) {
                Rules::from($rule['rule'])->getValidator()->validate($this->field->value);
            }
            return true;
        } catch (Exception $exception) {
            $this->errors[] = $exception->getMessage();
            return false;
        }
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
