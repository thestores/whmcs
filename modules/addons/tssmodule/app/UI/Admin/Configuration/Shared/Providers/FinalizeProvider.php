<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Providers;

use ModulesGarden\tssmodule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\Components\Actions\Redirect;
use ModulesGarden\tssmodule\Core\Routing\Url;

class FinalizeProvider extends CrudProvider
{
    public function read()
    {

    }

    public function update()
    {
        (new AddonModuleRepository())->finalize();
        // legacy modules chosen for migration: continue on the migration page
        $page = \ModulesGarden\tssmodule\App\Migration\Choice::toMigrate() ? 'migration' : 'home';
        return (new Response())->setSuccess($this->translate('successFinalize'))->setActions([new Redirect(Url::route('',
            ['module' => 'tssmodule', 'mg-page' => $page, 'mg-action' => 'index']
        ))]);

    }

}