<?php

namespace NW\WebService\References\Operations\Notification\StateChecker\Activities;

use NW\WebService\References\Operations\Notification\StateChecker\Conditions\NotificationClientByEmailCondition;
use NW\WebService\References\Operations\Notification\StateChecker\Conditions\NotificationClientBySmsCondition;
use NW\WebService\References\Operations\Notification\StateChecker\ReturnOperationStateChecker;

class NotificationClientActivity
{
    private const CONDITION_PIPE = [
        NotificationClientByEmailCondition::class => NotificationClientByEmailActivity::class,
        NotificationClientBySmsCondition::class => NotificationClientBySmsActivity::class

    ];
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function run(): void
    {
        foreach(self::CONDITION_PIPE as $condition => $activity){
            $condition = new $condition($this->returnOperationStateChecker);

            if($condition->isTrue()){
                $job = new $activity($this->returnOperationStateChecker);
                $job->run();
            }
        }
    }
}