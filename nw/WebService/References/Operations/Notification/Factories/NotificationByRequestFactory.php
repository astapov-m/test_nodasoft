<?php

namespace NW\WebService\References\Operations\Notification\Factories;

use NW\WebService\References\Operations\Notification\Notification;
use NW\WebService\References\Operations\Notification\Request\Interfaces\NotificationRequestInterface;

class NotificationByRequestFactory
{
    public static function make(NotificationRequestInterface $notification_request) : Notification {
        $notification = new Notification();
        $notification->setClient($notification_request->getClientId());
        $notification->setEmployeeExpert($notification_request->getExpertId());
        $notification->setEmployeeCreator($notification_request->getCreatorId());
        $notification->setSeller($notification_request->getResellerId());
        $notification->setNotificationType($notification_request->getNotificationType());
        $notification->setDate($notification_request->getDate());
        $notification->setDifferences($notification_request->getDifferences());
        $notification->setAgreementNumber($notification_request->getAgreementNumber());
        $notification->setComplaintNumber($notification_request->getComplaintNumber());
        $notification->setComplaintId($notification_request->getComplaintId());

        return $notification;
    }
}