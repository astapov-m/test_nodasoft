<?php

namespace NW\Components\Validation\Maps;

abstract class ValidationMap
{
    protected const Map = [];

    public static function getRules(): array{
        return static::Map;
    }
}