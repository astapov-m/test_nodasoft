<?php

namespace NW\WebService\References\Operations\Notification\Request;

abstract class RequestAbstractObject
{
    public function __construct(?array $data = [])
    {
        if (!empty($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->{$method}($value);
                }
            }
        }
    }
}