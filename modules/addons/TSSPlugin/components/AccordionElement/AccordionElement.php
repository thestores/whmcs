<?php

namespace ModulesGarden\TSSPlugin\Components\AccordionElement;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

class AccordionElement extends AbstractComponent implements ComponentContainerInterface
{
    use TextTrait;
    use TitleTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'AccordionElement';

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

    public function removeIcon()
    {
        $this->setSlot('removeIcon', true);

        return $this;
    }

    public function setTextCentered(bool $textCentered = true): self
    {
        $this->setSlot('textCentered', $textCentered);

        return $this;
    }
}