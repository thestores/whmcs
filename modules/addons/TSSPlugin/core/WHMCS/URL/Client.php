<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\URL;

class Client
{
    public static function productDetails(int $hostingId, array $parameters = [])
    {
        $parameters['action'] = 'productdetails';
        $parameters['id'] = $hostingId;

        return \ModulesGarden\TSSPlugin\Core\Routing\Url::clientarea('clientarea.php', $parameters);
    }
}