<?php

use ModulesGarden\TSSPlugin\Core\Hook\HookManager;
use ModulesGarden\TSSPlugin\Packages\Product\Services\ProductDuplicate;
use ModulesGarden\TSSPlugin\Core\Events\Events\ConfigOptionsLoaded;
use ModulesGarden\TSSPlugin\Core\Events\Events\ModuleActivated;
use ModulesGarden\TSSPlugin\Core\Events\Events\ModuleUpgraded;
use function ModulesGarden\TSSPlugin\Core\listen;

return [
    'bootstrap' => function() {
        HookManager::create(__DIR__, true);
        ProductDuplicate::checkAndInitDuplicateProcess();

        listen(ModuleActivated::class,\ModulesGarden\TSSPlugin\Packages\Product\Listeners\ModuleActivated::class);
        listen(ModuleUpgraded::class,\ModulesGarden\TSSPlugin\Packages\Product\Listeners\ModuleUpgraded::class);
        listen(ConfigOptionsLoaded::class,\ModulesGarden\TSSPlugin\Packages\Product\Listeners\ConfigOptionsLoaded::class);

        //Register Configuration Service
        \ModulesGarden\TSSPlugin\Core\DependencyInjection\Container::getInstance()
            ->singleton(\ModulesGarden\TSSPlugin\Packages\Product\Services\Configuration::class);
    },
    'packages'    => [
        'ModuleSettings',
    ],
];
