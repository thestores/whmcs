<?php

namespace ModulesGarden\tssmodule\Components\CopyPasswordInline;

use ModulesGarden\tssmodule\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\tssmodule\Core\Components\Traits\ActionOnClickTrait;

class CopyPasswordInline extends CopyTextInline
{
    use ActionOnClickTrait;

    public const COMPONENT = 'CopyPasswordInline';

    public function setVisible()
    {
        $this->setSlot('is_visible', true);

        return $this;
    }
}
