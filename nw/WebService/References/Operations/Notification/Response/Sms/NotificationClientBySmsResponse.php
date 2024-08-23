<?php

namespace NW\WebService\References\Operations\Notification\Response\Sms;

use NW\WebService\References\Operations\Notification\Response\AbstractNotificationResponseObject;
use NW\WebService\References\Operations\Notification\Response\Interfaces\NotificationClientBySmsResponseInterface;
use NW\WebService\References\Operations\Notification\Response\Interfaces\ResponseInterface;

class NotificationClientBySmsResponse extends AbstractNotificationResponseObject implements NotificationClientBySmsResponseInterface, ResponseInterface
{
    protected bool $isSent = false;
    protected string $message = '';

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setIsSent(bool $isSent): void
    {
         $this->isSent = $isSent;
    }

    public function getsSent(): bool
    {
        return $this->isSent;
    }
}