<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Conditions;

use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;
use function NW\WebService\References\Operations\Notification\getEmailsByPermit;
use function NW\WebService\References\Operations\Notification\getResellerEmailFrom;

class NotificationEmployeeEmailSenderCondition
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function isTrue(): bool {
        $resellerId = $this->returnOperationStateChecker->notification->getSeller()->id;
        $emailFrom = getResellerEmailFrom($resellerId);
        // Получаем email сотрудников из настроек
        $emails = getEmailsByPermit($resellerId, 'tsGoodsReturn');

        $this->returnOperationStateChecker->condition_property = [
            'emailFrom' => $emailFrom,
            'emails' => $emails,
            'resellerId' => $resellerId
        ];
        return !empty($emailFrom) && count($emails) > 0;
    }
}