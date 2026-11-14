<?php

namespace ModulesGarden\TSSPlugin\App\Models;

use ModulesGarden\TSSPlugin\Core\Models\ExtendedEloquentModel;

class CronCheck extends ExtendedEloquentModel
{

    public    $timestamps = true;
    protected $table      = 'CronsCheck';
    protected $fillable   = ['type', 'last_run', 'last_error'];
    protected $primaryKey = 'id';

}
