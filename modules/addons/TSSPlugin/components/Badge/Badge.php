<?php

namespace ModulesGarden\TSSPlugin\Components\Badge;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\OutlineTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;

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
