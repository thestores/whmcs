<?php

namespace ModulesGarden\TSSPlugin\App\Configuration\Addon\Activate;

use ModulesGarden\TSSPlugin\App\Helpers\EmailTemplates;

/**
 * Runs before module activation actions
 */
class Before extends \ModulesGarden\TSSPlugin\Core\Configuration\Addon\Activate\Before
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
