<?php

$hookManager->register(
    function($args) {
        (new \ModulesGarden\TSSPlugin\Packages\Logs\Services\AutoPrune())->run();
    },
    100
);
