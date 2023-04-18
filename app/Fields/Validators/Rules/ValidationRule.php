<?php

namespace App\Fields\Validators\Rules;

use App\Fields\Constants\Rules;
use Illuminate\Validation\ValidationException;

abstract class ValidationRule
{
    public function __construct(
        protected Rules  $name,
        protected string $message = 'Validation error',
        protected array  $params = [],
        protected string $type = 'error',
    )
    {
    }

    protected function getFormattedParams(): string
    {
        $separator = ':';
        return implode($separator, array_map(function ($key, $value) use ($separator) {
            return '|' . $key . $separator . $value;
        }, array_keys($this->getParams()), array_values($this->getParams())));
    }

    /**
     *
     * @param $value
     * @return void
     * @throws ValidationException
     */
    abstract function validate($value): void;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return ValidationRule
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return ValidationRule
     */
    public function setParams(array $params): static
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ValidationRule
     */
    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }
}
