<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Config;

use ModulesGarden\TSSPlugin\Core\Data\Container;

class Config extends Container
{
    public function __construct()
    {
        global $CONFIG;
        parent::__construct($CONFIG);
    }
}