<?php

namespace ModulesGarden\tssmodule\Core\Traits;

use ModulesGarden\tssmodule\Core\ServiceLocator;

/**
 * @deprecated
 */
trait Lang
{
    /**
     * @var null|\ModulesGarden\tssmodule\Core\Lang\Lang
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
