<?php

namespace NW\WebService\References\Operations\Notification;

use NW\Components\Validation\Traits\ValidateIsNullPropertyTrait;
use NW\WebService\References\Operations\Notification\Enums\NotificationTypeEnum;
use NW\WebService\References\Operations\Notification\Interfaces\NotificationInterface;
use NW\WebService\References\Operations\Notification\Request\Differences\DifferencesRequest;

class Notification implements NotificationInterface
{
    use ValidateIsNullPropertyTrait;

    public function __construct()
    {
        $this->skipped_property = [
            'differences'
        ];
    }

    private ?Seller $seller = null;
    private int $notificationType;

    private ?Contractor $client = null;
    private ?Employee $employee_creator = null;

    private ?Employee $employee_expert = null;

    private ?DifferencesRequest $differences;

    private int $complaintId;

    private string $complaintNumber;

    private int $consumptionId;
    private string $consumptionNumber;
    private string $agreementNumber;
    private string $date;

    /**
     * @return Contractor
     */
    public function getClient(): Contractor
    {
        return $this->client;
    }

    /**
     * @param int|Contractor $client Id Или Клиент
     */
    public function setClient(int|Contractor $client): void
    {
        $this->client = $client instanceof Contractor ? $client : Contractor::getById($client);
    }

    /**
     * @return Seller
     */
    public function getSeller(): Seller
    {
        return $this->seller;
    }

    /**
     * @param int|Seller $seller
     */
    public function setSeller(int|Seller $seller): void
    {
        $this->seller = $seller instanceof Seller ? $seller : Seller::getById($seller);
    }

    /**
     * @return Employee
     */
    public function getEmployeeCreator(): Employee
    {
        return $this->employee_creator;
    }

    /**
     * @param int|Employee $employee_creator
     */
    public function setEmployeeCreator(int|Employee $employee_creator): void
    {
        $this->employee_creator = $employee_creator instanceof Employee ? $employee_creator : Employee::getById($employee_creator);
    }

    /**
     * @return Employee
     */
    public function getEmployeeExpert(): Employee
    {
        return $this->employee_expert;
    }

    /**
     * @param int|Employee $expert
     */
    public function setEmployeeExpert(int|Employee $expert): void
    {
        $this->employee_expert = $expert instanceof Employee ? $expert : Employee::getById($expert);
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
     * @return ?DifferencesRequest
     */
    public function getDifferences(): ?DifferencesRequest
    {
        return $this->differences;
    }

    /**
     * @param null|array|DifferencesRequest $differences
     */
    public function setDifferences(null|array|DifferencesRequest $differences): void
    {
        if (is_null($differences)) $differences = null;
        $this->differences = $differences instanceof DifferencesRequest ? $differences : new DifferencesRequest($differences);
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
}