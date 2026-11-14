<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\TSSPlugin\Components\Alert\AlertEdit;
use ModulesGarden\TSSPlugin\Components\Alert\AlertSuccess;
use ModulesGarden\TSSPlugin\Components\Button\ButtonEdit;
use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Components\Modal\ModalInfo;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\Modals\Forms\Confirm;


class InfoModals extends AbstractModals
{

    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle('Info Modals');

        $this->simple();
        $this->withForm();
        $this->withAlertAndForm();
    }

    protected function simple()
    {
        $modal = new ModalInfo();
        $modal->setTitle('Info Modal');
        $modal->setContent('bla bla bla bla');

        $button = new ButtonPrimary();
        $button->setTitle('Simple Modal');
        $button->onClick(Action::modalOpen($modal));

        $this->addToToolbar($button);
    }

    protected function withForm()
    {
        $modal = new ModalInfo();
        $modal->setTitle('Info Modal With Form');
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Info Modal With Form');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }

    protected function withAlertAndForm()
    {
        $alert = new AlertSuccess();
        $alert->setText('Wiesz co robisz?');

        $modal = new ModalInfo();
        $modal->setTitle('Info Modal With Alert');
        $modal->addElement($alert);
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Info Modal With Alert');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }
}