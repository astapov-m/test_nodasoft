<?php

namespace NW\WebService\References\Operations\Notification\StateChecker;

use NW\WebService\References\Operations\Notification\Interfaces\NotificationInterface;
use NW\WebService\References\Operations\Notification\Response\Interfaces\NotificationResponseInterface;

class ReturnOperationStateChecker
{
    public array $condition_property = [];
    public function __construct(public NotificationInterface $notification, public NotificationResponseInterface $response, public array $templateData){}
}