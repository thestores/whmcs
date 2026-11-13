<?php

namespace ModulesGarden\tssmodule\Packages\Logs\Http\Admin;

use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Helper;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\UI\View;
use ModulesGarden\tssmodule\Packages\Logs\UI\Pages\LogsDataTable;
use ModulesGarden\tssmodule\Packages\Logs\UI\Widgets\Summary;

class Logs extends AbstractController implements AdminAreaInterface
{
    /**
     * Example of static page
     * @return View
     */
    /** Ends debug mode before its time runs out (link with the admin token) */
    public function stopDebug()
    {
        if(\ModulesGarden\tssmodule\App\Libs\CsrfToken::valid($_REQUEST['token'] ?? ''))
        {
            \ModulesGarden\tssmodule\App\Libs\GeneralSettings::save(['debugServices' => '', 'debugUntil' => 0]);
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
