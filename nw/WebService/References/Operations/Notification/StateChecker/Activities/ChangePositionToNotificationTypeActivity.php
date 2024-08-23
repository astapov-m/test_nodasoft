<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Activities;

use NW\WebService\References\Operations\Notification\Enums\NotificationTypeEnum;
use NW\WebService\References\Operations\Notification\Interfaces\NotificationInterface;
use NW\WebService\References\Operations\Notification\Status;

class ChangePositionToNotificationTypeActivity
{
    private array $templateData;
    public function __construct(private NotificationInterface $notification)
    {
    }

    public function run() : void{
        $client_full_name = $this->notification->getClient()->getFullName();
        $this->templateData = [
            'COMPLAINT_ID' => $this->notification->getComplaintId(),
            'COMPLAINT_NUMBER' => $this->notification->getComplaintNumber(),
            'CREATOR_ID' => $this->notification->getEmployeeCreator()->id,
            'CREATOR_NAME' => $this->notification->getEmployeeCreator()->getFullName(),
            'EXPERT_ID' => $this->notification->getEmployeeExpert()->id,
            'EXPERT_NAME' => $this->notification->getEmployeeExpert()->getFullName(),
            'CLIENT_ID' => $this->notification->getClient()->id,
            'CLIENT_NAME' => !empty($client_full_name) ? $client_full_name : $this->notification->getClient()->name,
            'CONSUMPTION_ID' => $this->notification->getConsumptionId(),
            'CONSUMPTION_NUMBER' => $this->notification->getConsumptionNumber(),
            'AGREEMENT_NUMBER' => $this->notification->getAgreementNumber(),
            'DATE' => $this->notification->getDate(),
            'DIFFERENCES' => match ($this->notification->getNotificationType()) {
                NotificationTypeEnum::TYPE_NEW->value => (function () {
                    $runner = new NewPositionAdded(); //fake
                    return $runner->run(null, $this->notification->getSeller()->id);
                })(),
                NotificationTypeEnum::TYPE_CHANGE->value => (function () {
                    if (!is_null($this->notification->getDifferences())) {
                        $from = Status::getName($this->notification->getDifferences()->getFrom());
                        $to = Status::getName($this->notification->getDifferences()->getTo());
                        if (!is_null($from) && !is_null($to)) {
                            $runner = new PositionStatusHasChanged(); //fake
                            return $runner->run([
                                'FROM' => $from,
                                'TO' => $to,
                            ], $this->notification->getSeller()->id);
                        }

                    }
                    return  throw new \Exception("Invalid value Differences", 400);
                })(),
                default => throw new \Exception("Invalid value notificationType", 400),
            },
        ];
    }

    /**
     * @return mixed
     */
    public function getTemplateData(): mixed
    {
        return $this->templateData;
    }
}