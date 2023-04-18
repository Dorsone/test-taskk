<?php

namespace App\Services;

use App\Fields\Field;
use App\Fields\Validators\FieldValidator;
use App\Fields\Validators\FormValidator;

class ValidatorService
{
    public function validate(Field $item): ?array
    {
        $validator = new FieldValidator($item);
        return ['success' => $validator->validate(), 'errors' => $validator->errors()];
    }

    public function validateAll(array $rules): array
    {
        $validator = new FormValidator($rules);
        return ['success' => $validator->validate(), 'errors' => $validator->errors()];
    }
}
