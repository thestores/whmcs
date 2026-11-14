<?php

namespace ModulesGarden\TSSPlugin\Components\XtermjsConsole;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;

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