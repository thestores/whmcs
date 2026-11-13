<?php

use ModulesGarden\tssmodule\Core\Components\Enums\Type;
use ModulesGarden\tssmodule\Core\DependencyInjection\Container;
use ModulesGarden\tssmodule\Packages\Logs\Enums\LogTypes;
use ModulesGarden\tssmodule\Packages\Logs\Listeners\ModuleActivated;
use ModulesGarden\tssmodule\Packages\Logs\Listeners\ModuleUpgraded;
use ModulesGarden\tssmodule\Packages\Logs\Services\Logs;
use function ModulesGarden\tssmodule\Core\listen;

return [
    'menu'        => [
        'admin'  => [
            'logs' => [
                'icon' => 'mdi mdi-clipboard-text',
            ],
        ],
        'client' => [

        ],
    ],
    'controllers' => [
        'admin'  => [
            \ModulesGarden\tssmodule\Packages\Logs\Http\Admin\Logs::class,
        ],
        'client' => [

        ],
    ],
    'packages'    => [
        'ModuleSettings'
    ],
    'config'      => [
        'colors' => [
            LogTypes::EMERGENCY => [
                'type'   => \ModulesGarden\tssmodule\Core\Components\Enums\Type::DANGER,
                'icon'   => 'alert-triangle',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ALERT     => [
                'type'   => Type::PRIMARY,
                'icon'   => 'alert-circle-o',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::CRITICAL  => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-polygon',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ERROR     => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-octagon',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::WARNING   => [
                'type'   => Type::WARNING,
                'icon'   => 'alert-circle',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonWarning::class,
            ],
            LogTypes::NOTICE    => [
                'type'   => Type::INFO,
                'icon'   => 'info',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonInfo::class,
            ],
            LogTypes::INFO      => [
                'type'   => Type::SUCCESS,
                'icon'   => 'information-outline',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonInfo::class,
            ],
            LogTypes::DEBUG     => [
                'type'   => Type::DEFAULT,
                'icon'   => 'bug',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonBasic::class,
            ],
            'total'             => [
                'type'   => Type::DEFAULT,
                'icon'   => 'layers',
                'button' => \ModulesGarden\tssmodule\Components\Button\ButtonBasic::class,
            ],
        ],
    ],
    'bootstrap'   => function() {
//        $oClass = new \ReflectionClass(\ModulesGarden\tssmodule\Packages\Logs\Enums\LogTypes::class);
//        foreach ($oClass->getConstants() as $type)
//        {
//            call_user_func([\ModulesGarden\tssmodule\Packages\Logs\Support\Facades\Logger::class, $type], $type. '{adawd}', ['adawd' => $type]);
//        }

        \ModulesGarden\tssmodule\Core\Hook\HookManager::create(__DIR__, true);
        Container::getInstance()->singleton(Logs::class);
        listen(\ModulesGarden\tssmodule\Core\Events\Events\ModuleActivated::class, ModuleActivated::class);
        listen(\ModulesGarden\tssmodule\Core\Events\Events\ModuleUpgraded::class, ModuleUpgraded::class);
    },
];
