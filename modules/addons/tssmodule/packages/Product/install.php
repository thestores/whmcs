<?php

use ModulesGarden\tssmodule\Core\Hook\HookManager;
use ModulesGarden\tssmodule\Packages\Product\Services\ProductDuplicate;
use ModulesGarden\tssmodule\Core\Events\Events\ConfigOptionsLoaded;
use ModulesGarden\tssmodule\Core\Events\Events\ModuleActivated;
use ModulesGarden\tssmodule\Core\Events\Events\ModuleUpgraded;
use function ModulesGarden\tssmodule\Core\listen;

return [
    'bootstrap' => function() {
        HookManager::create(__DIR__, true);
        ProductDuplicate::checkAndInitDuplicateProcess();

        listen(ModuleActivated::class,\ModulesGarden\tssmodule\Packages\Product\Listeners\ModuleActivated::class);
        listen(ModuleUpgraded::class,\ModulesGarden\tssmodule\Packages\Product\Listeners\ModuleUpgraded::class);
        listen(ConfigOptionsLoaded::class,\ModulesGarden\tssmodule\Packages\Product\Listeners\ConfigOptionsLoaded::class);

        //Register Configuration Service
        \ModulesGarden\tssmodule\Core\DependencyInjection\Container::getInstance()
            ->singleton(\ModulesGarden\tssmodule\Packages\Product\Services\Configuration::class);
    },
    'packages'    => [
        'ModuleSettings',
    ],
];
