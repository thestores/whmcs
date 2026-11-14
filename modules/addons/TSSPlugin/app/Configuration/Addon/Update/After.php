<?php

namespace ModulesGarden\TSSPlugin\App\Configuration\Addon\Update;

use ModulesGarden\TSSPlugin\Core\Database\FileLoader;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

/**
 * runs after module update actions
 */
class After extends \ModulesGarden\TSSPlugin\Core\Configuration\Addon\Update\After
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
        \ModulesGarden\TSSPlugin\App\Libs\AisHelpers::ensureColumns();

        return $return;
    }
}
