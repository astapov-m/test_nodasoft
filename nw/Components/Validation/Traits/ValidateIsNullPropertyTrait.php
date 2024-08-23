<?php

namespace NW\Components\Validation\Traits;

trait ValidateIsNullPropertyTrait
{
    private array $skipped_property = [];
    public function getIsNullProperty() : ?string
    {
        foreach ($this as $key => $difference) {
            if (is_null($difference) && !in_array($key,$this->skipped_property)) return $key;
        }
        return null;
    }
}