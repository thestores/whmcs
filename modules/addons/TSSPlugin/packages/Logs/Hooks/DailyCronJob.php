<?php

// only through WHMCS: a direct request gets nothing (no output, no error with the server path)
if(!defined('WHMCS'))
{
    http_response_code(403);
    exit;
}


$hookManager->register(
    function($args) {
        (new \ModulesGarden\TSSPlugin\Packages\Logs\Services\AutoPrune())->run();
    },
    100
);
