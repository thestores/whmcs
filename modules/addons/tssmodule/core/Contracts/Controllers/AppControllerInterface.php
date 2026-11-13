<?php

namespace ModulesGarden\tssmodule\Core\Contracts\Controllers;

interface AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params);
}
