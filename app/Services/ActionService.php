<?php

namespace App\Services;

use App\Fields\Field;
use App\Fields\Storage\FormProcessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ActionService
{
    public function store(array $fields): array
    {
        $storage = new FormProcessor($fields);
        return ['success' => $storage->process(), 'errors' => $storage->errors()];
    }

    /**
     * @param Collection $fields
     * @return array<Field>
     */
    public function getFields(Collection $fields): array
    {
        $json = file_get_contents(storage_path('app/data.json'));
        $rules = collect(json_decode($json, true)['data']['fields'])->whereIn('id', $fields->pluck('id'));

        return $rules->map(function (array $model) use (&$fields) {
            $field = $fields->where('id', '=', $model['id'])->first();

            return new Field(
                $model['id'],
                $field['value'],
                $model['validation'],
                $model['label'],
            );
        })->toArray();
    }
}
