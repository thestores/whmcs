<?php

namespace ModulesGarden\tssmodule\Core\UI\View;

use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\Core\Services\Messages;
use function ModulesGarden\tssmodule\Core\make;

class AlertsBuilder
{
    public function create(): array
    {
        $alerts = [];
        foreach (make(Messages::class)->getAlerts() as $message)
        {
            $alerts[] = (new Alert())
                ->setText($message->getText())
                ->setType($message->getType())
                ->setOutline();
        }

        return $alerts;
    }
}