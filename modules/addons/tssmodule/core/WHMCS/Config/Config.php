<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\Config;

use ModulesGarden\tssmodule\Core\Data\Container;

class Config extends Container
{
    public function __construct()
    {
        global $CONFIG;
        parent::__construct($CONFIG);
    }
}