<?php

namespace NW\WebService\References\Operations\Notification\Request;

use NW\WebService\References\Operations\Notification\Request\Differences\DifferencesRequest;
use NW\WebService\References\Operations\Notification\Request\Interfaces\NotificationRequestInterface;

class NotificationRequest extends RequestAbstractObject implements NotificationRequestInterface
{

    private int $resellerId;
    private int $notificationType;

    private int $clientId;
    private int $creatorId;

    private int $expertId;

    private ?DifferencesRequest $differences = null;

    private int $complaintId;

    private string $complaintNumber;

    private int $consumptionId;
    private string $consumptionNumber;
    private string $agreementNumber;
    private string $date;
    /**
     * @return string
     */
    public function getAgreementNumber(): string
    {
        return $this->agreementNumber;
    }

    /**
     * @param string $agreementNumber
     */
    public function setAgreementNumber(string $agreementNumber): void
    {
        $this->agreementNumber = $agreementNumber;
    }

    /**
     * @return int
     */
    public function getComplaintId(): int
    {
        return $this->complaintId;
    }

    /**
     * @param int $complaintId
     */
    public function setComplaintId(int $complaintId): void
    {
        $this->complaintId = $complaintId;
    }

    /**
     * @return string
     */
    public function getComplaintNumber(): string
    {
        return $this->complaintNumber;
    }

    /**
     * @param string $complaintNumber
     */
    public function setComplaintNumber(string $complaintNumber): void
    {
        $this->complaintNumber = $complaintNumber;
    }

    /**
     * @return int
     */
    public function getConsumptionId(): int
    {
        return $this->consumptionId;
    }

    /**
     * @param int $consumptionId
     */
    public function setConsumptionId(int $consumptionId): void
    {
        $this->consumptionId = $consumptionId;
    }

    /**
     * @return string
     */
    public function getConsumptionNumber(): string
    {
        return $this->consumptionNumber;
    }

    /**
     * @param string $consumptionNumber
     */
    public function setConsumptionNumber(string $consumptionNumber): void
    {
        $this->consumptionNumber = $consumptionNumber;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return ?DifferencesRequest
     */
    public function getDifferences(): ?DifferencesRequest
    {
        return $this->differences;
    }

    /**
     * @param array|DifferencesRequest $differences
     */
    public function setDifferences(array|DifferencesRequest $differences): void
    {
        $this->differences = $differences instanceof DifferencesRequest ? $differences : new DifferencesRequest($differences);
    }

    /**
     * @return int
     */
    public function getNotificationType(): int
    {
        return $this->notificationType;
    }

    /**
     * @param int $notificationType
     */
    public function setNotificationType(int $notificationType): void
    {
        $this->notificationType = $notificationType;
    }

    /**
     * @return int
     */
    public function getExpertId(): int
    {
        return $this->expertId;
    }

    /**
     * @param int $expertId
     */
    public function setExpertId(int $expertId): void
    {
        $this->expertId = $expertId;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }

    /**
     * @param int $creatorId
     */
    public function setCreatorId(int $creatorId): void
    {
        $this->creatorId = $creatorId;
    }

    /**
     * @return int
     */
    public function getResellerId(): int
    {
        return $this->resellerId;
    }

    /**
     * @param int $resellerId
     */
    public function setResellerId(int $resellerId): void
    {
        $this->resellerId = $resellerId;
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     */
    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
    }
}