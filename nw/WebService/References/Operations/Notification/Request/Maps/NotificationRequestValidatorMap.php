<?php

namespace NW\WebService\References\Operations\Notification\Request\Maps;

use NW\Components\Validation\Maps\Interfaces\ValidatorMapInterface;
use NW\Components\Validation\Maps\ValidationMap;

class NotificationRequestValidatorMap extends ValidationMap implements ValidatorMapInterface
{
    protected const Map = [
        'resellerId' => 'required|int',
        'notificationType' => 'required|int',
        'clientId' => 'required|int',
        'creatorId' => 'required|int',
        'expertId' => 'required|int',
        'differences' => 'differences',
        'complaintId' => 'required|int',
        'complaintNumber' => 'required|string',
        'consumptionId' => 'required|int',
        'consumptionNumber' => 'required|string',
        'agreementNumber' => 'required|string',
        'date' => 'required|string',
    ];
}