<?php

namespace ModulesGarden\tssmodule\Components\XtermjsConsole;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;

class XtermjsConsole extends AbstractComponent
{
    public const COMPONENT = "XtermjsConsole";

    public function setWebSocketUrl(string $url) : self
    {
        $this->setSlot('websocketUrl', $url);

        return $this;
    }

    public function setInitializeCommands(array $commands) : self
    {
        $this->setSlot('commands', $commands);

        return $this;
    }
}