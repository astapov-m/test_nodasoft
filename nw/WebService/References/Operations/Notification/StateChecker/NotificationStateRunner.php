<?php

namespace NW\WebService\References\Operations\Notification\StateChecker;

use NW\WebService\References\Operations\Notification\StateChecker\Activities\NotificationClientActivity;
use NW\WebService\References\Operations\Notification\StateChecker\Activities\NotificationEmployeeEmailSenderActivity;
use NW\WebService\References\Operations\Notification\StateChecker\Conditions\NotificationClientCondition;
use NW\WebService\References\Operations\Notification\StateChecker\Conditions\NotificationEmployeeEmailSenderCondition;

class NotificationStateRunner
{
    private const CONDITION_PIPE = [
        NotificationEmployeeEmailSenderCondition::class => NotificationEmployeeEmailSenderActivity::class,
        NotificationClientCondition::class => NotificationClientActivity::class

    ];
    public function __construct(private ReturnOperationStateChecker $returnOperationStateChecker){}

    public function run():void
    {
        foreach(self::CONDITION_PIPE as $condition => $activity){
            try {
                $condition = new $condition($this->returnOperationStateChecker);

                if($condition->isTrue()){
                    $job = new $activity($this->returnOperationStateChecker);
                    $job->run();
                }
            }catch (\Exception $exception){
                Log::channel('daily')->error("%s%s\n[stacktrace]\n%s\n",);
            }


        }
    }
}