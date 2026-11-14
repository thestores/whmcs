<?php

namespace ModulesGarden\TSSPlugin\Fragments\ServerServicesTable\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Redirect;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Routing\Url;

class ServiceRedirectButton extends IconButton implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate("service_details"));
        $this->setIcon("information");

        $this->onClick((new Redirect(Url::adminarea('clientsservices.php'), [
            'userid' => 'client_id',
            'productselect' => 'service_id'
        ])));
    }
}