<?php

namespace ModulesGarden\tssmodule\Components\Badge;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\OutlineTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;

/**
 * Class Form
 */
class Badge extends AbstractComponent
{
    use AjaxTrait;
    use TextTrait;
    use TitleTrait;
    use OutlineTrait;

    public const COMPONENT = 'Badge';

    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::DEFAULT);
    }

    public function setType(string $type)
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
