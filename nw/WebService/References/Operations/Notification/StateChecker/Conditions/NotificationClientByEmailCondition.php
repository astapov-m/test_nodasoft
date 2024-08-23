<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Conditions;

use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationClientByEmailCondition
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function isTrue(): bool {
        return !empty($this->returnOperationStateChecker->condition_property['emailFrom']) && !empty($this->returnOperationStateChecker->notification->getClient()->email);
    }
}