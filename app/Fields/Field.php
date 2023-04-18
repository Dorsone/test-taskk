<?php

namespace App\Fields;

class Field
{
    public function __construct(
        protected int $id,
        protected string $label,
        protected string $type,
        protected mixed $value,
        protected array $validation
    )
    {
    }
}
