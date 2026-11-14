<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\UI\View;
use function ModulesGarden\TSSPlugin\Core\translate;

class CustomErrorPage extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct(string $message)
    {
        parent::__construct();

        $zeroBlock = new \ModulesGarden\TSSPlugin\Components\CustomErrorPage\CustomErrorPage();
        $zeroBlock->setTitle(translate("customErrorMessages." . $message . '.title'));
        $zeroBlock->setDescription(translate("customErrorMessages." . $message . '.description'));

        $this->addElement($zeroBlock);
    }

}