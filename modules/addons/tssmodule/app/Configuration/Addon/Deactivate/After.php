<?php

namespace ModulesGarden\tssmodule\App\Configuration\Addon\Deactivate;

/**
 * Runs after addon deactivation
 */
class After extends \ModulesGarden\tssmodule\Core\Configuration\Addon\Deactivate\After
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        $return = parent::execute($params);

        return $return;
    }
}
