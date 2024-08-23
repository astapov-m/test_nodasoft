<?php

namespace NW\WebService\References\Operations\Notification;

use NW\WebService\References\Operations\Notification\Factories\NotificationByRequestFactory;
use NW\WebService\References\Operations\Notification\Request\Maps\NotificationRequestValidatorMap;
use NW\WebService\References\Operations\Notification\Request\NotificationRequest;
use NW\WebService\References\Operations\Notification\Request\Validation\NotificationRequestValidator;
use NW\WebService\References\Operations\Notification\Response\NotificationResponse;
use NW\WebService\References\Operations\Notification\StateChecker\Activities\ChangePositionToNotificationTypeActivity;
use NW\WebService\References\Operations\Notification\StateChecker\NotificationStateRunner;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class ReturnOperation
{
    /**
     * @throws \Exception
     */
    public function doOperation(): array
    {
        $data = (array)$this->getRequest('data');

        $request_validator = new NotificationRequestValidator();
        if (!$request_validator->validate($data, NotificationRequestValidatorMap::getRules())){
            throw new \Exception("{$request_validator->getMessage()} not found!", 400);
        }
        $request = new NotificationRequest($data);
        $notification = NotificationByRequestFactory::make($request);


        $null_other = $notification->getIsNullProperty();
        if (!$null_other){
            throw new \Exception("{$null_other} not found!", 400);
        }
        $position_changer = new ChangePositionToNotificationTypeActivity($notification);
        $position_changer->run();

        $templateData = $position_changer->getTemplateData();

        $response = new NotificationResponse();

        $state_checker = new ReturnOperationStateChecker($notification, $response, $templateData);
        $state_runner = new NotificationStateRunner($state_checker);
        $state_runner->run();

        return $response->toArray();
    }
}