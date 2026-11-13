<?php

namespace ModulesGarden\tssmodule\Components\Accordion;

use ModulesGarden\tssmodule\Components\AccordionElement\AccordionElement;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;

class Accordion extends AbstractComponent
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Accordion';
    public const MODE_ACCORDION = 'accordion';
    public const MODE_COLLAPSE_GROUP = 'collapseGroup';

    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::DEFAULT);
        $this->setMode(self::MODE_ACCORDION);
    }

    public function setType(string $type):self
    {
        $this->setSlot('type', $type);

        return $this;
    }

    public function addItem(AccordionElement $item): self
    {
        $this->pushToSlot('accordionElements', $item);

        return $this;
    }

    public function setMode(string $mode):self
    {
        $this->setSlot('mode', $mode);

        return $this;
    }

    public function enableItemsBorder(bool $enabled = true):self
    {
        $this->setSlot('itemsBorder', $enabled);

        return $this;
    }
}