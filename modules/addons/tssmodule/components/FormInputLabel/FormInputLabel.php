<?php

namespace ModulesGarden\tssmodule\Components\FormInputLabel;

use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class FormInputLabel extends AbstractComponent implements FormFieldInterface
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'FormInputLabel';

    public function getName(): string
    {
        return '';
    }

    public function setIcon(string $icon): self
    {
        $this->setSlot('icon', $icon);
        // inline SVG, rendered instead of the icon class when there is one
        $this->setSlot('iconSvg', Icons::svg($icon));

        return $this;
    }

    public function setFor(string $for): self
    {
        $this->setSlot('for', $for);

        return $this;
    }
}