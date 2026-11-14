<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Switchers;

use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnActionInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use WHMCS\User\Client;

class TaxExempt extends Switcher implements \ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface, AjaxOnActionInterface
{
    protected string $provider = \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Providers\TaxExempt::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;
}
