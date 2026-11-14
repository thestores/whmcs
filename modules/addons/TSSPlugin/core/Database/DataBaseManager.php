<?php

namespace ModulesGarden\TSSPlugin\Core\Database;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\MySqlBuilder;
use ModulesGarden\TSSPlugin\Core\Database\Builders\ModuleMySqlBuilder;

class DatabaseManager
{
    public function dropAllModuleTables()
    {
        $builder = new ModuleMySqlBuilder(Manager::connection());
        $builder->dropAllTables();
    }
}