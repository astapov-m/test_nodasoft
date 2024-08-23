<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Conditions;

use NW\WebService\References\Operations\Notification\Enums\NotificationTypeEnum;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationClientCondition
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function isTrue(): bool {
        return $this->returnOperationStateChecker->notification->getNotificationType() === NotificationTypeEnum::TYPE_CHANGE->value ; //!empty($data['differences']['to']) - упало бы рашьне, если бы не было
    }
}