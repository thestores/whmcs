<?php

use ModulesGarden\TSSPlugin\Core\Components\Enums\Type;
use ModulesGarden\TSSPlugin\Core\DependencyInjection\Container;
use ModulesGarden\TSSPlugin\Packages\Logs\Enums\LogTypes;
use ModulesGarden\TSSPlugin\Packages\Logs\Listeners\ModuleActivated;
use ModulesGarden\TSSPlugin\Packages\Logs\Listeners\ModuleUpgraded;
use ModulesGarden\TSSPlugin\Packages\Logs\Services\Logs;
use function ModulesGarden\TSSPlugin\Core\listen;

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
            \ModulesGarden\TSSPlugin\Packages\Logs\Http\Admin\Logs::class,
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
                'type'   => \ModulesGarden\TSSPlugin\Core\Components\Enums\Type::DANGER,
                'icon'   => 'alert-triangle',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ALERT     => [
                'type'   => Type::PRIMARY,
                'icon'   => 'alert-circle-o',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonDanger::class,
            ],
            LogTypes::CRITICAL  => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-polygon',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ERROR     => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-octagon',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonDanger::class,
            ],
            LogTypes::WARNING   => [
                'type'   => Type::WARNING,
                'icon'   => 'alert-circle',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonWarning::class,
            ],
            LogTypes::NOTICE    => [
                'type'   => Type::INFO,
                'icon'   => 'info',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonInfo::class,
            ],
            LogTypes::INFO      => [
                'type'   => Type::SUCCESS,
                'icon'   => 'information-outline',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonInfo::class,
            ],
            LogTypes::DEBUG     => [
                'type'   => Type::DEFAULT,
                'icon'   => 'bug',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonBasic::class,
            ],
            'total'             => [
                'type'   => Type::DEFAULT,
                'icon'   => 'layers',
                'button' => \ModulesGarden\TSSPlugin\Components\Button\ButtonBasic::class,
            ],
        ],
    ],
    'bootstrap'   => function() {
//        $oClass = new \ReflectionClass(\ModulesGarden\TSSPlugin\Packages\Logs\Enums\LogTypes::class);
//        foreach ($oClass->getConstants() as $type)
//        {
//            call_user_func([\ModulesGarden\TSSPlugin\Packages\Logs\Support\Facades\Logger::class, $type], $type. '{adawd}', ['adawd' => $type]);
//        }

        \ModulesGarden\TSSPlugin\Core\Hook\HookManager::create(__DIR__, true);
        Container::getInstance()->singleton(Logs::class);
        listen(\ModulesGarden\TSSPlugin\Core\Events\Events\ModuleActivated::class, ModuleActivated::class);
        listen(\ModulesGarden\TSSPlugin\Core\Events\Events\ModuleUpgraded::class, ModuleUpgraded::class);
    },
];
