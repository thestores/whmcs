<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers;

use ModulesGarden\TSSPlugin\App\Libs\AutoInstallQueue;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

class ResetTaskProvider extends CrudProvider
{
    public function update()
    {
        AutoInstallQueue::resetTask((int)$this->formData['id']);
    }
}
