<?php

use ModulesGarden\TSSPlugin\Core\Events\Events\ModuleActivated;
use ModulesGarden\TSSPlugin\Core\Events\Events\PreServerConfigurationLoaded;
use ModulesGarden\TSSPlugin\Core\Events\Events\ConfigOptionsLoaded;
use function ModulesGarden\TSSPlugin\Core\listen;

return [
    'bootstrap' => function() {
        listen(ModuleActivated::class, \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Listeners\ModuleActivated::class);
        listen(PreServerConfigurationLoaded::class, \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Listeners\PreServerConfigurationLoaded::class);
        listen(ConfigOptionsLoaded::class, \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Listeners\ModuleActivated::class);

        \ModulesGarden\TSSPlugin\Core\DependencyInjection\Container::getInstance()->singleton(\ModulesGarden\TSSPlugin\Packages\ModuleSettings\Services\ModuleSettings::class);
    },
];
