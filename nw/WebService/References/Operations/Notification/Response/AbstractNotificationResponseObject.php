<?php

namespace NW\WebService\References\Operations\Notification\Response;

use NW\WebService\References\Operations\Notification\Response\Interfaces\ResponseInterface;

abstract class AbstractNotificationResponseObject implements ResponseInterface
{
    public function toArray() : array
    {
        foreach (get_object_vars($this) as $key => $value) {
            if (!$value instanceof ResponseInterface){
                $result[$key] = $value;
                continue;
            }
            while ($value instanceof ResponseInterface) {
                $value =  $value->toArray();
                $result[$key] = $value;
            }
        }
        return $result;
    }
}