<?php

namespace NW\WebService\References\Operations\Notification\Request\Interfaces;

use NW\WebService\References\Operations\Notification\Request\Differences\DifferencesRequest;

interface NotificationRequestInterface
{
    /**
     * @return string
     */
    public function getAgreementNumber(): string;

    /**
     * @return int
     */
    public function getComplaintId(): int;

    /**
     * @return string
     */
    public function getComplaintNumber(): string;

    /**
     * @return int
     */
    public function getConsumptionId(): int;

    /**
     * @return string
     */
    public function getConsumptionNumber(): string;

    /**
     * @return string
     */
    public function getDate(): string;

    /**
     * @return ?DifferencesRequest
     */
    public function getDifferences(): ?DifferencesRequest;

    /**
     * @return int
     */
    public function getNotificationType(): int;

     /**
      * @return int
      */
    public function getExpertId(): int;

    /**
     * @return int
     */
    public function getCreatorId(): int;

    /**
     * @return int
     */
    public function getResellerId(): int;

    /**
     * @return int
     */
    public function getClientId(): int;



}