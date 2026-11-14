<?php


namespace ModulesGarden\TSSPlugin\Packages\Logs\Support\Facades;

use ModulesGarden\TSSPlugin\Core\Support\Facades\AbstractFacade;
use ModulesGarden\TSSPlugin\Packages\Logs\Services\Logs;

/**
 * @method static emergency($message, array $data = [])
 * @method static alert($message, array $data = [])
 * @method static critical($message, array $data = [])
 * @method static error($message, array $data = [])
 * @method static warning($message, array $data = [])
 * @method static notice($message, array $data = [])
 * @method static info($message, array $data = [])
 * @method static debug($message, array $data = [])
 */
class Logger extends AbstractFacade
{

    protected static function getFacadeAccessor(): string
    {
        return Logs::class;
    }
}