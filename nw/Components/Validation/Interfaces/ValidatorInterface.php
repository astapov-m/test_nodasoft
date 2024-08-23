<?php

namespace NW\Components\Validation\Interfaces;

interface ValidatorInterface
{
    public function validate(array $data, array $rules) : bool;
    public function getMessage();
}