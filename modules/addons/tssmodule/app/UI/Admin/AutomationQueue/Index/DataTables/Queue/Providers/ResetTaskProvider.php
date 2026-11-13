<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers;

use ModulesGarden\tssmodule\App\Libs\AutoInstallQueue;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;

class ResetTaskProvider extends CrudProvider
{
    public function update()
    {
        AutoInstallQueue::resetTask((int)$this->formData['id']);
    }
}
