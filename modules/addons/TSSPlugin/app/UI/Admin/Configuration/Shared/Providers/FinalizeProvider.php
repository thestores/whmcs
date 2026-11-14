<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\Providers;

use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Redirect;
use ModulesGarden\TSSPlugin\Core\Routing\Url;

class FinalizeProvider extends CrudProvider
{
    public function read()
    {

    }

    public function update()
    {
        (new AddonModuleRepository())->finalize();
        // legacy modules chosen for migration: continue on the migration page
        $page = \ModulesGarden\TSSPlugin\App\Migration\Choice::toMigrate() ? 'migration' : 'home';
        return (new Response())->setSuccess($this->translate('successFinalize'))->setActions([new Redirect(Url::route('',
            ['module' => 'TSSPlugin', 'mg-page' => $page, 'mg-action' => 'index']
        ))]);

    }

}