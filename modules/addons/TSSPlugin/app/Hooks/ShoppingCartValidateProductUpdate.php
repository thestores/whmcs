<?php

// only through WHMCS: a direct request gets nothing (no output, no error with the server path)
if(!defined('WHMCS'))
{
    http_response_code(403);
    exit;
}


use TSSPlugin\App\Libs\Subscriptions\AcmeHelpers;
use WHMCS\Database\Capsule;

$hookManager->register(
    function($params) {

        $pid = isset($_SESSION['cart']['products'][$params['i']]['pid']) ? (int)$_SESSION['cart']['products'][$params['i']]['pid'] : 0;

        // code signing: 2 / 3 years only on an own HSM
        $csError = $pid ? \TSSPlugin\App\Libs\ProductLines\CodeSigningService::cartError($pid, $params['billingcycle'] ?? ($_SESSION['cart']['products'][$params['i']]['billingcycle'] ?? ''), (array)($params['configoption'] ?? [])) : null;
        if ($csError)
        {
            return [\TSSPlugin\App\Kernel\Lang::text($csError)];
        }

        if (!$pid || !AcmeHelpers::isAcmeWhmcsProduct($pid))
        {
            return;
        }

        $sansOptionId = Capsule::table('tblproductconfigoptions')
            ->join('tblproductconfiglinks', 'tblproductconfiglinks.gid', '=', 'tblproductconfigoptions.gid')
            ->where('tblproductconfiglinks.pid', $pid)
            ->where(function($q) {
                $q->where('tblproductconfigoptions.optionname', 'sans')
                  ->orWhere('tblproductconfigoptions.optionname', 'LIKE', 'sans|%');
            })
            ->value('tblproductconfigoptions.id');

        $wildcardOptionId = Capsule::table('tblproductconfigoptions')
            ->join('tblproductconfiglinks', 'tblproductconfiglinks.gid', '=', 'tblproductconfigoptions.gid')
            ->where('tblproductconfiglinks.pid', $pid)
            ->where(function($q) {
                $q->where('tblproductconfigoptions.optionname', 'sans_wildcard')
                  ->orWhere('tblproductconfigoptions.optionname', 'LIKE', 'sans_wildcard|%');
            })
            ->value('tblproductconfigoptions.id');

        $configoptions = isset($params['configoption']) ? $params['configoption'] : [];
        $sansCount     = ($sansOptionId && isset($configoptions[$sansOptionId])) ? (int)$configoptions[$sansOptionId] : 0;
        $wildcardCount = ($wildcardOptionId && isset($configoptions[$wildcardOptionId])) ? (int)$configoptions[$wildcardOptionId] : 0;

        if ($sansCount <= 0 && $wildcardCount <= 0)
        {
            return [\TSSPlugin\App\Kernel\Lang::text('acme_order_requires_at_least_one_san')];
        }
    },
    1
);
