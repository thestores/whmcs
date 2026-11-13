<?php

namespace ModulesGarden\tssmodule\Core\Traits;

/**
 * @deprecated
 */
trait IsAdmin
{
    /**
     * @var null|bool
     * determines if run in Admin or Client context
     * @deprecated
     */
    protected $isAdminStatus = null;

    /**
     * return bool
     */
    public function isAdmin()
    {
        if ($this->isAdminStatus === null)
        {
            $this->isAdminStatus = \ModulesGarden\tssmodule\Core\Helper\isAdmin();
        }

        return $this->isAdminStatus;
    }
}
