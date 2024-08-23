<?php

namespace NW\Components\Validation\Maps\Interfaces;

use NW\Components\Validation\Validator;

interface ValidatorMapInterface
{
    public static function getRules() : array;
}