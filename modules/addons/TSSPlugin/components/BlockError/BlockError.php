<?php

namespace ModulesGarden\TSSPlugin\Components\BlockError;

use ModulesGarden\TSSPlugin\Components\Alert\AlertDanger;
use ModulesGarden\TSSPlugin\Components\Div\Div;
use ModulesGarden\TSSPlugin\Components\PreBlock\PreBlock;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\Exceptions\UserException;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;

class BlockError extends Div implements ClientAreaInterface, AdminAreaInterface
{
    protected \Throwable $exception;

    public function setException(\Throwable $exception)
    {
        $this->exception = $exception;
    }

    public function loadHtml(): void
    {
        $alert = new AlertDanger();
        $alert->setText($this->exception->getMessage());
        $this->addElement($alert);

        if (Config::get('configuration.debug', false) && !($this->exception instanceof UserException))
        {
            $pre = new PreBlock();
            $pre->setContent($this->exception->getTraceAsString());

            $this->addElement($pre);
        }
    }
}
