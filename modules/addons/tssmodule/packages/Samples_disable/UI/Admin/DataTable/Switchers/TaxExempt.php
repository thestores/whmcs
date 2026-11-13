<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Switchers;

use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnActionInterface;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use WHMCS\User\Client;

class TaxExempt extends Switcher implements \ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface, AjaxOnActionInterface
{
    protected string $provider = \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Providers\TaxExempt::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;
}
