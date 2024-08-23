<?php

namespace NW\WebService\References\Operations\Notification\Response;

use NW\WebService\References\Operations\Notification\Response\Interfaces\NotificationClientBySmsResponseInterface;
use NW\WebService\References\Operations\Notification\Response\Interfaces\NotificationResponseInterface;
use NW\WebService\References\Operations\Notification\Response\Interfaces\ResponseInterface;
use NW\WebService\References\Operations\Notification\Response\Sms\NotificationClientBySmsResponse;

class NotificationResponse extends AbstractNotificationResponseObject implements ResponseInterface, NotificationResponseInterface
{
    protected bool $notificationEmployeeByEmail = false;
    protected bool $notificationClientByEmail = false;
    protected NotificationClientBySmsResponseInterface $notificationClientBySms;

    public function __construct()
    {
        $this->notificationClientBySms = new NotificationClientBySmsResponse();
    }

    /**
     * @return NotificationClientBySmsResponseInterface
     */
    public function getNotificationClientBySms(): NotificationClientBySmsResponseInterface
    {
        return $this->notificationClientBySms;
    }

    /**
     * @param bool $notificationClientByEmail
     */
    public function setNotificationClientByEmail(bool $notificationClientByEmail): void
    {
        $this->notificationClientByEmail = $notificationClientByEmail;
    }

    /**
     * @param NotificationClientBySmsResponseInterface $notificationClientBySms
     */
    public function setNotificationClientBySms(NotificationClientBySmsResponseInterface $notificationClientBySms): void
    {
        $this->notificationClientBySms = $notificationClientBySms;
    }

    /**
     * @param bool $notificationEmployeeByEmail
     */
    public function setNotificationEmployeeByEmail(bool $notificationEmployeeByEmail): void
    {
        $this->notificationEmployeeByEmail = $notificationEmployeeByEmail;
    }

    public function getNotificationEmployeeByEmail(): bool
    {
        return $this->notificationEmployeeByEmail;
    }

    public function getNotificationClientByEmail(): bool
    {
        return $this->notificationClientByEmail;
    }
}