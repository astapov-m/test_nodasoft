<?php

namespace NW\WebService\References\Operations\Notification\Request\Maps;

use NW\Components\Validation\Maps\Interfaces\ValidatorMapInterface;
use NW\Components\Validation\Maps\ValidationMap;

class DifferencesRequestValidatorMap extends ValidationMap implements ValidatorMapInterface
{
    protected const Map = [
        'from' => 'required|int',
        'to' => 'required|int',
    ];
}