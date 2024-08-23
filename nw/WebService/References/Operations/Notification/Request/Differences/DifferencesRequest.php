<?php

namespace NW\WebService\References\Operations\Notification\Request\Differences;

use NW\WebService\References\Operations\Notification\Request\Interfaces\DifferencesRequestInterface;
use NW\WebService\References\Operations\Notification\Request\RequestAbstractObject;

class DifferencesRequest extends RequestAbstractObject implements DifferencesRequestInterface
{
    private int $from;
    private int $to;

    /**
     * @return int
     */
    public function getTo(): int
    {
        return $this->to;
    }

    /**
     * @param int $to
     */
    public function setTo(int $to): void
    {
        $this->to = $to;
    }

    /**
     * @return int
     */
    public function getFrom(): int
    {
        return $this->from;
    }

    /**
     * @param int $from
     */
    public function setFrom(int $from): void
    {
        $this->from = $from;
    }
}