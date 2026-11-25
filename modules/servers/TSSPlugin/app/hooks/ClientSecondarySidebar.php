<?php

namespace TSSPlugin\Server\app\hooks;


/**
 * SSL summary in the secondary sidebar (on all pages, or on the pages listed in the settings)
 *
 * WHMCS hook ClientAreaSecondarySidebar (registered in hooks.php).
 */
class ClientSecondarySidebar
{
    public static function handle($secondarySidebar)
    {
        try
        {
            if(empty($_SESSION['uid']) || !\TSSPlugin\App\Libs\Support\GeneralSettings::enabled('clientSummary'))
            {
                return;
            }

            global $smarty;
            $template = is_object($smarty) && isset($smarty->tpl_vars['templatefile']) ? (string)$smarty->tpl_vars['templatefile']->value : '';
            $allowed  = array_filter(array_map('trim', explode(',', (string)\TSSPlugin\App\Libs\Support\GeneralSettings::get('sidebarTemplates'))));
            if($allowed ? !in_array($template, $allowed, true) : $template === 'clientareahome')
            {
                return;
            }

            $counts = (new \TSSPlugin\App\Libs\Certificates\ClientSslSummary($_SESSION['uid']))->counts();
            if(!$counts['total'])
            {
                return;
            }

            $t    = \TSSPlugin\App\ClientArea\SslPages::texts();
            $menu = $secondarySidebar->addChild('tssSslSummary', [
                'label' => $t['summaryTitle'],
                'icon'  => 'fa-lock',
                'order' => 99,
            ]);
            unifiedSslLabelBlock($menu, $t['summaryTitle'], \TSSPlugin\App\Libs\Support\Edition::brand());
            $order = 10;
            foreach(\TSSPlugin\App\Libs\Certificates\ClientSslSummary::TYPES as $type)
            {
                $menu->addChild('tssSsl_' . $type, [
                    'label' => $t[$type],
                    'uri'   => 'index.php?m=TSSPlugin&type=' . $type,
                    'badge' => (int)$counts[$type],
                    'order' => $order++,
                ]);
            }
            if(\TSSPlugin\App\Libs\Support\GeneralSettings::enabled('certificatesByDomain'))
            {
                $menu->addChild('tssSsl_domains', [
                    'label' => $t['byDomain'],
                    'uri'   => 'index.php?m=TSSPlugin&page=domains',
                    'order' => $order++,
                ]);
            }
            if(\TSSPlugin\App\Libs\Support\GeneralSettings::enabled('sslTools'))
            {
                $menu->addChild('tssSsl_tools', [
                    'label' => $t['sslTools'],
                    'uri'   => 'index.php?m=TSSPlugin&page=tools',
                    'order' => $order,
                ]);
            }
        }
        catch(\Throwable $e)
        {
        }
    }
}
