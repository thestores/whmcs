<?php

namespace ModulesGarden\TSSPlugin\App\Middlewares;

use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\TSSPlugin\Core\Http\Request;
use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Routing\Middleware\AbstractMiddleware;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request as RequestCore;

class Controller extends AbstractMiddleware
{
    public function __invoke(Request $request, \Closure $next)
    {
        $page = RequestCore::get('mg-page');
        if(empty($page)) $page = 'home';

        $menu = ['home','products','import','statistics','reports','pricing','settings'];
        $moduleConfiguration = (new AddonModuleRepository())->getModuleConfiguration();
        if(in_array($page, $menu) && (empty($moduleConfiguration) || (!isset($moduleConfiguration['test_connection']) || $moduleConfiguration['test_connection'] == 'error')))
        {
           return Helper\redirect('configuration', 'step1');
        }

        if($page == 'configuration' && !empty($moduleConfiguration) && isset($moduleConfiguration['test_connection']) && $moduleConfiguration['test_connection'] == 'success')
        {
           return Helper\redirect('home', 'index');
        }

        return $next($request);
    }
}
