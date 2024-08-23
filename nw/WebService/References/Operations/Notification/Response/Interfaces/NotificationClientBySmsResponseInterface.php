<?php

namespace NW\WebService\References\Operations\Notification\Response\Interfaces;

interface NotificationClientBySmsResponseInterface
{
    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @param string $message
     */
    public function setMessage(string $message): void;

    public function setIsSent(bool $isSent): void;

    public function getsSent(): bool;
}