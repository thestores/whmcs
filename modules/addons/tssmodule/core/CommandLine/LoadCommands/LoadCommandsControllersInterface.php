<?php

namespace ModulesGarden\tssmodule\Core\CommandLine\LoadCommands;

interface LoadCommandsControllersInterface
{
    public function getCommands(string $dir = null): array;
}
