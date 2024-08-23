<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Activities;

use NW\WebService\References\Operations\Notification\MessagesClient;
use NW\WebService\References\Operations\Notification\NotificationEvents;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationClientByEmailActivity
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function run(): void
    {
        MessagesClient::sendMessage([
            0 => [ // MessageTypes::EMAIL
                'emailFrom' => $this->returnOperationStateChecker->condition_property['emailFrom'],
                'emailTo' => $this->returnOperationStateChecker->notification->getClient()->email,
                'subject' => __('complaintClientEmailSubject', $this->returnOperationStateChecker->templateData, $this->returnOperationStateChecker->condition_property['resellerId']),
                'message' => __('complaintClientEmailBody', $this->returnOperationStateChecker->templateData, $this->returnOperationStateChecker->condition_property['resellerId']),
            ],
        ], $this->returnOperationStateChecker->condition_property['resellerId'], $this->returnOperationStateChecker->notification->getClient()->id, NotificationEvents::CHANGE_RETURN_STATUS, $this->returnOperationStateChecker->notification->getDifferences()->getTo());
        $this->returnOperationStateChecker->response->setNotificationEmployeeByEmail(true);
    }
}