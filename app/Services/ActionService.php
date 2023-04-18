<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ActionService
{
        public function store(array $fields): array
        {
            // сохраням в бд уже валидированные записи
            return [];
        }

        public function getRules(Collection $fields): Collection
        {
            $rules = Model::query()->whereIn('id', $fields->pluck('id'))->get(['id', 'validation', 'label']);

            return $rules->map(function (Model $model) use (&$fields) {
                $field = $fields->where('id', '=', $model->id)->first();

                return [
                    'id' => $model->id,
                    'validation' => $model->validation,
                    'field' => [
                        $model->label  => $field['value']
                    ],
                ];
            });
        }
}
