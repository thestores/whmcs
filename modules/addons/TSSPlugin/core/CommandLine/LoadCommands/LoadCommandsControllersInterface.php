<?php

namespace ModulesGarden\TSSPlugin\Core\CommandLine\LoadCommands;

interface LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array;
}
