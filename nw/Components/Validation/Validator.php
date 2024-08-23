<?php

namespace NW\Components\Validation;

use NW\Components\Validation\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
    protected const DEFAULT_RULES_MAP = [
        'required' => [
            'message' => 'Missing value',
            'method' => 'validateRequired'
        ],
        'string' => [
            'message' => 'Invalid value',
            'method' => 'validateString'
        ],
        'int' => [
            'message' => 'Invalid value',
            'method' => 'validateInt'
        ],
        'array' => [
            'message' => 'Invalid value',
            'method' => 'validateArray'
        ],
    ];

    protected const UNIQUE_RULES_MAP = [];

    private string $message = '';
    public function validate(array $data, array $rules): bool
    {
        foreach ($rules as $key => $rule){
            $validationRule = explode('|', $rule);
            foreach ($validationRule as $method){
                $rules_item = $this::DEFAULT_RULES_MAP[$method] ?? $this::UNIQUE_RULES_MAP[$method] ?? null;
                if(!is_null($rules_item) && method_exists($this, $rules_item['method'])){

                    if (!$this->{$rules_item['method']}($data, $key)){
                        $this->message .= "{$key} {$rules_item['message']}; ";
                        return false;
                    }

                }
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function validateRequired(array $data, string $field): bool{
        return array_key_exists($field, $data) && !empty($data[$field]);
    }

    public function validateInt(array $data, string $field): bool{
        $condition = $data[$field] ?? null;
        return is_int($condition);
    }

    public function validateString(array $data, string $field): bool{
        $condition = $data[$field] ?? null;
        return is_string($condition);
    }
    public function validateArray(array $data, string $field): bool{
        $condition = $data[$field] ?? null;
        return is_array($condition);
    }
}