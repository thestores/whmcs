<?php

namespace ModulesGarden\TSSPlugin\Components\CopyPasswordInline;

use ModulesGarden\TSSPlugin\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ActionOnClickTrait;

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
