<?php

namespace ModulesGarden\tssmodule\App\Configuration\Server\Update;

/**
 * runs before module update actions
 */
class Before extends \ModulesGarden\tssmodule\Core\Configuration\Addon\Update\Before
{
    /**
     * @return array
     */
    public function execute($version)
    {
        $return = parent::execute($version);

        return $return;
    }
}
