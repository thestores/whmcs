<?php

use ModulesGarden\tssmodule\Core\Events\Events\ModuleActivated;
use ModulesGarden\tssmodule\Core\Events\Events\PreServerConfigurationLoaded;
use ModulesGarden\tssmodule\Core\Events\Events\ConfigOptionsLoaded;
use function ModulesGarden\tssmodule\Core\listen;

return [
    'bootstrap' => function() {
        listen(ModuleActivated::class, \ModulesGarden\tssmodule\Packages\ModuleSettings\Listeners\ModuleActivated::class);
        listen(PreServerConfigurationLoaded::class, \ModulesGarden\tssmodule\Packages\ModuleSettings\Listeners\PreServerConfigurationLoaded::class);
        listen(ConfigOptionsLoaded::class, \ModulesGarden\tssmodule\Packages\ModuleSettings\Listeners\ModuleActivated::class);

        \ModulesGarden\tssmodule\Core\DependencyInjection\Container::getInstance()->singleton(\ModulesGarden\tssmodule\Packages\ModuleSettings\Services\ModuleSettings::class);
    },
];
