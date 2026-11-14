<?php

use ModulesGarden\TSSPlugin\App\Cron\TestCommand;

return [
    'commands' => function () {
        return [
            new \ModulesGarden\TSSPlugin\Packages\Scheduler\Models\Command(TestCommand::class, "*/5 * * * *", ['someParam' => 997])
        ];
    }
];
