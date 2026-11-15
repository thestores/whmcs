<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\Libs\CsrfToken;
use ModulesGarden\TSSPlugin\App\Libs\Update\Installer;
use ModulesGarden\TSSPlugin\App\Libs\Update\Release;
use ModulesGarden\TSSPlugin\App\UI\Admin\ModuleUpdate\UpdateContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use WHMCS\Database\Capsule;

/**
 * Module update page (App\Libs\Update). The install runs as three requests - download and verify, back up, swap -
 * each a POST that redirects back here; the page posts the next step by itself until the update is done or fails.
 * Only full administrators may start an update or a rollback.
 */
class ModuleUpdate extends AbstractController implements AdminAreaInterface
{
    const SESSION = 'tss_module_update';

    const STEPS = ['prepare', 'backup', 'install'];

    public function index()
    {
        return Helper\view()->addElement(UpdateContainer::class);
    }

    /** Looks for a release now */
    public function check()
    {
        return $this->run(function() {
            Release::check(true);
            $_SESSION[self::SESSION] = ['notice' => 'checked'];
        });
    }

    public function step()
    {
        return $this->run(function() {
            $step = (string)($_POST['step'] ?? '');
            if(!in_array($step, self::STEPS, true))
            {
                throw new \RuntimeException('Unknown step');
            }
            $result = $step === 'prepare' ? Installer::prepare() : ($step === 'backup' ? Installer::backup() : Installer::install((int)($_SESSION['adminid'] ?? 0)));
            $next   = self::STEPS[array_search($step, self::STEPS, true) + 1] ?? null;
            $_SESSION[self::SESSION] = $next ? ['next' => $next, 'done' => $step] : ['notice' => 'installed', 'detail' => $result['to'] ?? ''];
        });
    }

    public function rollback()
    {
        return $this->run(function() {
            $result = Installer::rollback((int)($_SESSION['adminid'] ?? 0));
            $_SESSION[self::SESSION] = ['notice' => 'rolled_back', 'detail' => $result['to'] ?? ''];
        });
    }

    protected function run(callable $action)
    {
        try
        {
            if(($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST' || !CsrfToken::valid($_POST['token'] ?? ''))
            {
                throw new \RuntimeException('Invalid or expired security token. Reload the page and try again.');
            }
            if(!self::fullAdmin())
            {
                throw new \RuntimeException('Only full administrators can update the module.');
            }
            $action();
        }
        catch(\Throwable $e)
        {
            $_SESSION[self::SESSION] = ['error' => $e->getMessage()];
        }

        return Helper\redirect('moduleUpdate', 'index');
    }

    /** The WHMCS role "Full Administrator" (role 1 on every install) */
    public static function fullAdmin()
    {
        $adminId = (int)($_SESSION['adminid'] ?? 0);
        if(!$adminId)
        {
            return false;
        }
        $role = Capsule::table('tbladmins')->join('tbladminroles', 'tbladminroles.id', '=', 'tbladmins.roleid')
            ->where('tbladmins.id', $adminId)->first(['tbladminroles.id', 'tbladminroles.name']);

        return $role && ((int)$role->id === 1 || strcasecmp((string)$role->name, 'Full Administrator') === 0);
    }
}
