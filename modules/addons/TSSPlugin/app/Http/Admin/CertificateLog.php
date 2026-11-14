<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\Libs\AutoInstallQueue;
use ModulesGarden\TSSPlugin\App\UI\Admin\CertificateLog\Index\CertificateLogContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use WHMCS\Database\Capsule;

/**
 * Certificate event log: order, validation, reissue and installation events of all services, with clear
 */
class CertificateLog extends AbstractController implements AdminAreaInterface
{
    public function index()
    {
        return Helper\view()->addElement(CertificateLogContainer::class);
    }

    /** GET older=<days>|all with the admin link token */
    public function clear()
    {
        if(\ModulesGarden\TSSPlugin\App\Libs\CsrfToken::valid($_REQUEST['token'] ?? ''))
        {
            AutoInstallQueue::createTables();
            $query = Capsule::table(AutoInstallQueue::logsTable());
            $older = (string)($_REQUEST['older'] ?? '');
            // only "all" or a number of days: anything else deletes nothing
            if($older === 'all' || (ctype_digit($older) && (int)$older > 0))
            {
                if($older !== 'all')
                {
                    $query->where('created_at', '<', date('Y-m-d H:i:s', strtotime('-' . (int)$older . ' days')));
                }
                $_SESSION['tss_log_notice'] = $query->delete();
            }
        }

        return Helper\redirect('certificateLog', 'index');
    }
}
