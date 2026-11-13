<?php

namespace ModulesGarden\tssmodule\App\Configuration\Addon\Update;

use ModulesGarden\tssmodule\Core\Database\FileLoader;
use ModulesGarden\tssmodule\Core\ModuleConstants;

/**
 * runs after module update actions
 */
class After extends \ModulesGarden\tssmodule\Core\Configuration\Addon\Update\After
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        $return = parent::execute($params);

        $fileLoader = new FileLoader();
        $fileLoader->performQueryFromFile(ModuleConstants::getFullPath('app', 'Database', 'schema.sql'));
        // columns added to existing tables
        \ModulesGarden\tssmodule\App\Libs\AisHelpers::ensureColumns();

        return $return;
    }
}
