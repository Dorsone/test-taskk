<?php

namespace App\Services;

use App\DTO\ValidationValue;
use App\DTO\ValidationValues;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class ValidatorService
{
    public function validate(ValidationValue $item): ?array
    {
        // не обращать внимание, сделано на быструю руку)
        $item = $item->collect()->toArray();

        $fieldName = array_key_first($item);

        $messages = $this->formatMessages($fieldName, $item['validation']);

        $validator = Validator::make($item['field'], [
            $fieldName => $item['validation']->pluck('rule'),
        ], $messages);

        if ($validator->fails()) {
            return [
                $item['id'] => $validator->errors()
            ];
        }

        return null;
    }

    public function validateAll(ValidationValues $rules): array
    {
        $errors = [];

        // не обращать внимание, сделано на быструю руку)
        $rules = $rules->collect();

        $rules->each(function (array $item) use (&$errors) {
            $item = new ValidationValue(collect($item));
            $errors[] += $this->validate($item) ?? [];
        });

        if (empty($errors)) {
            return ['success' => true, 'data' => $rules->get('field')];
        }

        return ['success' => false, 'errors' => $errors];
    }

    protected function formatMessages(string $fieldName, Collection $validations): array
    {
        $messages = [];

        $validations->each(function (Collection $rule) use ($fieldName, &$messages) {
            $messages[$fieldName . $rule['rule']] = $rule['message'];
        });

        return $messages;
    }

}
