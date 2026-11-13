<?php

$hookManager->register(
    function($args) {
        (new \ModulesGarden\tssmodule\Packages\Logs\Services\AutoPrune())->run();
    },
    100
);
