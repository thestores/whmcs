<?php

namespace ModulesGarden\tssmodule\App\Configuration\Addon\Activate;

use ModulesGarden\tssmodule\App\Helpers\EmailTemplates;

/**
 * Runs before module activation actions
 */
class Before extends \ModulesGarden\tssmodule\Core\Configuration\Addon\Activate\Before
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        $return = parent::execute($params);

        EmailTemplates::createTemplates();

        return $return;
    }
}
