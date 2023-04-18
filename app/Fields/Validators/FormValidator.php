<?php

namespace App\Fields\Validators;

use App\Fields\Field;
use Generator;

class FormValidator
{
    /**
     * @param array<Field> $fields
     */
    public function __construct(
        protected array $fields,
    )
    {
    }

    protected array $errors = [];

    public function validate(): bool
    {
        foreach ($this->fields as $field) {
            $fieldValidator = (new FieldValidator($field));
            if (!$fieldValidator->validate()) {
                $this->errors[$field->id] = $fieldValidator->errors();
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
