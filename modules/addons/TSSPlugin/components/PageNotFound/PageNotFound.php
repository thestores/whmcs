<?php

namespace ModulesGarden\TSSPlugin\Components\PageNotFound;

use ModulesGarden\TSSPlugin\Components\BlockZeroData\BlockZeroData;
use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Core\Components\Actions\RedirectToPreviousPage;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;

class PageNotFound extends BlockZeroData implements ClientAreaInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setDescription($this->translate('description'));

        $button = new ButtonPrimary();
        $button->setTitle($this->translate('return_button'));
        $button->onClick(new RedirectToPreviousPage());
        $this->addElement($button);
    }
}
