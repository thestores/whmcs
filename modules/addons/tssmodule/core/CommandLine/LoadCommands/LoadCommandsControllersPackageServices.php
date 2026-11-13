<?php

namespace ModulesGarden\tssmodule\Core\CommandLine\LoadCommands;

use ModulesGarden\tssmodule\Core\DependencyInjection\PackageServices;
use function ModulesGarden\tssmodule\Core\make;

class LoadCommandsControllersPackageServices implements LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array
    {
        $commands = make(PackageServices::class)->getCommands();

        return $commands;
    }
}
