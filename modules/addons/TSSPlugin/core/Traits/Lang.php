<?php

namespace ModulesGarden\TSSPlugin\Core\Traits;

use ModulesGarden\TSSPlugin\Core\ServiceLocator;

/**
 * @deprecated
 */
trait Lang
{
    /**
     * @var null|\ModulesGarden\TSSPlugin\Core\Lang\Lang
     */
    protected $lang = null;

    /**
     * @return void
     * @deprecated
     */
    public function loadLang()
    {
        if ($this->lang === null)
        {
            $this->lang = ServiceLocator::call('lang');
        }
    }
}
