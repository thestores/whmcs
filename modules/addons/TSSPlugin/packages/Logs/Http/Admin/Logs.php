<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\Http\Admin;

use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\UI\View;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Pages\LogsDataTable;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Widgets\Summary;

class Logs extends AbstractController implements AdminAreaInterface
{
    /**
     * Example of static page
     * @return View
     */
    /** Ends debug mode before its time runs out (link with the admin token) */
    public function stopDebug()
    {
        if(\ModulesGarden\TSSPlugin\App\Libs\CsrfToken::valid($_REQUEST['token'] ?? ''))
        {
            \ModulesGarden\TSSPlugin\App\Libs\GeneralSettings::save(['debugServices' => '', 'debugUntil' => 0]);
        }

        return Helper\redirect('logs', 'index');
    }

    public function index()
    {
        return Helper\view()
            ->addElement(Summary::class)
            ->addElement(LogsDataTable::class);
    }
}
