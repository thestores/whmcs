<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\tssmodule\Components\Alert\AlertEdit;
use ModulesGarden\tssmodule\Components\Alert\AlertSuccess;
use ModulesGarden\tssmodule\Components\Button\ButtonEdit;
use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms\Confirm;


class EditModals extends AbstractModals
{

    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle('Edit Modals');

        $this->withForm();
        $this->withAlertAndForm();
    }

    protected function withForm()
    {
        $modal = new ModalEdit();
        $modal->setTitle('Simple Modal With Form');
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Simple Modal With Form');
        $button->onClick(Action::modalOpen($modal));

        $this->addToToolbar($button);
    }

    protected function withAlertAndForm()
    {
        $alert = new AlertSuccess();
        $alert->setText('Wiesz co robisz?');

        $modal = new ModalEdit();
        $modal->setTitle('Simple Modal With Alert');
        $modal->addElement($alert);
        $modal->addElement(new Confirm());

        $button = new ButtonPrimary();
        $button->setTitle('Simple Modal With Alert');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }
}