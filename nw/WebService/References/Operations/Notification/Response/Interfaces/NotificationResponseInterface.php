<?php

namespace NW\WebService\References\Operations\Notification\Response\Interfaces;

interface NotificationResponseInterface
{

    /**
     * @return NotificationClientBySmsResponseInterface
     */
    public function getNotificationClientBySms(): NotificationClientBySmsResponseInterface;

    /**
     * @param bool $notificationClientByEmail
     */
    public function setNotificationClientByEmail(bool $notificationClientByEmail): void;

    /**
     * @param NotificationClientBySmsResponseInterface $notificationClientBySms
     */
    public function setNotificationClientBySms(NotificationClientBySmsResponseInterface $notificationClientBySms): void;

    /**
     * @param bool $notificationEmployeeByEmail
     */
    public function setNotificationEmployeeByEmail(bool $notificationEmployeeByEmail): void;

    public function getNotificationEmployeeByEmail(): bool;

    public function getNotificationClientByEmail(): bool;
}