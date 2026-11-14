<?php

namespace ModulesGarden\TSSPlugin\Core\CommandLine\LoadCommands;

use ModulesGarden\TSSPlugin\Core\DependencyInjection\PackageServices;
use function ModulesGarden\TSSPlugin\Core\make;

class LoadCommandsControllersPackageServices implements LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array
    {
        $commands = make(PackageServices::class)->getCommands();

        return $commands;
    }
}
