<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Activities;

use NW\WebService\References\Operations\Notification\MessagesClient;
use NW\WebService\References\Operations\Notification\NotificationEvents;
use NW\WebService\References\Operations\Notification\NotificationManager;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationClientBySmsActivity
{
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function run(): void
    {
        $res = NotificationManager::send($this->returnOperationStateChecker->condition_property['resellerId'], $this->returnOperationStateChecker->notification->getClient()->id, NotificationEvents::CHANGE_RETURN_STATUS, $this->returnOperationStateChecker->notification->getDifferences()->getTo(), $this->returnOperationStateChecker->templateData, $error);
        if ($res) {
            $this->returnOperationStateChecker->response->getNotificationClientBySms()->setIsSent(true);
        }
        if (!empty($error)) {
            $this->returnOperationStateChecker->response->getNotificationClientBySms()->setMessage($error);
        }
    }
}