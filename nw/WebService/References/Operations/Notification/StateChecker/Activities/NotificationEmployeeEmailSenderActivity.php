<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Activities;

use NW\WebService\References\Operations\Notification\MessagesClient;
use NW\WebService\References\Operations\Notification\NotificationEvents;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationEmployeeEmailSenderActivity
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function run(): void
    {
        foreach ($this->returnOperationStateChecker['emails'] as $email) {
            MessagesClient::sendMessage([
                0 => [ // MessageTypes::EMAIL
                    'emailFrom' => $this->returnOperationStateChecker['emailFrom'],
                    'emailTo' => $email,
                    'subject' => __('complaintEmployeeEmailSubject', $this->returnOperationStateChecker->templateData,  $this->returnOperationStateChecker['resellerId']),
                    'message' => __('complaintEmployeeEmailBody', $this->returnOperationStateChecker->templateData,  $this->returnOperationStateChecker['resellerId']),
                ],
            ],  $this->returnOperationStateChecker['resellerId'], NotificationEvents::CHANGE_RETURN_STATUS);
            $this->returnOperationStateChecker->response->setNotificationEmployeeByEmail(true);
        }
    }
}