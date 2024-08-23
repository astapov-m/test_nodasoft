<?php

namespace NW\WebService\References\Operations\Notification\Request\Interfaces;

interface DifferencesRequestInterface
{
    public function getTo(): int;
    public function getFrom(): int;
}