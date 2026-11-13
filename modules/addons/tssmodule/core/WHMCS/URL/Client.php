<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\URL;

class Client
{
    public static function productDetails(int $hostingId, array $parameters = [])
    {
        $parameters['action'] = 'productdetails';
        $parameters['id'] = $hostingId;

        return \ModulesGarden\tssmodule\Core\Routing\Url::clientarea('clientarea.php', $parameters);
    }
}