<?php

use ModulesGarden\tssmodule\App\Cron\TestCommand;

return [
    'commands' => function () {
        return [
            new \ModulesGarden\tssmodule\Packages\Scheduler\Models\Command(TestCommand::class, "*/5 * * * *", ['someParam' => 997])
        ];
    }
];
