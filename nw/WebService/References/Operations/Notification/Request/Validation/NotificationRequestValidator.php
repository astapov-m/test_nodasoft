<?php

namespace NW\WebService\References\Operations\Notification\Request\Validation;

use NW\Components\Validation\Interfaces\ValidatorInterface;
use NW\Components\Validation\Validator;
use NW\WebService\References\Operations\Notification\Request\Maps\DifferencesRequestValidatorMap;

class NotificationRequestValidator extends Validator implements ValidatorInterface
{
    protected const UNIQUE_RULES_MAP = [
        'differences' => [
            'message' => 'Invalid value',
            'method' => 'validateDifferences',
        ]
    ];
    public function validateDifferences(array $data, string $field) : bool
    {
        if (array_key_exists($field, $data) && is_array($data[$field])) {
            return $this->validate($data[$field], DifferencesRequestValidatorMap::getRules());
        }
        return true;
    }
}