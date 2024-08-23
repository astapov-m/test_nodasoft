<?php

namespace NW\WebService\References\Operations\Notification\Interfaces;

use NW\WebService\References\Operations\Notification\Contractor;
use NW\WebService\References\Operations\Notification\Employee;
use NW\WebService\References\Operations\Notification\Request\Differences\DifferencesRequest;
use NW\WebService\References\Operations\Notification\Seller;

interface NotificationInterface
{
    /**
     * @return Contractor
     */
    public function getClient(): Contractor;

    /**
     * @param int|Contractor $client Id Или Клиент
     */
    public function setClient(int|Contractor $client): void;

    /**
     * @return Seller
     */
    public function getSeller(): Seller;

    /**
     * @param int|Seller $seller
     */
    public function setSeller(int|Seller $seller): void;

    /**
     * @return Employee
     */
    public function getEmployeeCreator(): Employee;

    /**
     * @param int|Employee $employee_creator
     */
    public function setEmployeeCreator(int|Employee $employee_creator): void;

    /**
     * @return Employee
     */
    public function getEmployeeExpert(): Employee;

    /**
     * @param int|Employee $expert
     */
    public function setEmployeeExpert(int|Employee $expert): void;

    /**
     * @return int
     */
    public function getNotificationType(): int;

    /**
     * @param int $notificationType
     */
    public function setNotificationType(int $notificationType): void;

    /**
     * @return ?DifferencesRequest
     */
    public function getDifferences(): ?DifferencesRequest;

    /**
     * @param null|array|DifferencesRequest $differences
     */
    public function setDifferences(null|array|DifferencesRequest $differences): void;

    /**
     * @return string
     */
    public function getDate(): string;

    /**
     * @param string $date
     */
    public function setDate(string $date): void;

    /**
     * @return string
     */
    public function getConsumptionNumber(): string;

    /**
     * @param string $consumptionNumber
     */
    public function setConsumptionNumber(string $consumptionNumber): void;

    /**
     * @return int
     */
    public function getConsumptionId(): int;

    /**
     * @param int $consumptionId
     */
    public function setConsumptionId(int $consumptionId): void;

    /**
     * @return string
     */
    public function getComplaintNumber(): string;

    /**
     * @param string $complaintNumber
     */
    public function setComplaintNumber(string $complaintNumber): void;

    /**
     * @return int
     */
    public function getComplaintId(): int;

    /**
     * @param int $complaintId
     */
    public function setComplaintId(int $complaintId): void;

    /**
     * @return string
     */
    public function getAgreementNumber(): string;

    /**
     * @param string $agreementNumber
     */
    public function setAgreementNumber(string $agreementNumber): void;
}