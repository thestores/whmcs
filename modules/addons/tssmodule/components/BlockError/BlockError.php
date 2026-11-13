<?php

namespace ModulesGarden\tssmodule\Components\BlockError;

use ModulesGarden\tssmodule\Components\Alert\AlertDanger;
use ModulesGarden\tssmodule\Components\Div\Div;
use ModulesGarden\tssmodule\Components\PreBlock\PreBlock;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\Exceptions\UserException;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;

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
