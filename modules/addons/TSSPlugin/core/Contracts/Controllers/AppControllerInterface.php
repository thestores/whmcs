<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts\Controllers;

interface AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params);
}
