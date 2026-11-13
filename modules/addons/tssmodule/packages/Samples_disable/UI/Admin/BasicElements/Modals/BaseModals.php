<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Modals;

use ModulesGarden\tssmodule\Components\Alert\AlertDanger;
use ModulesGarden\tssmodule\Components\Button\ButtonDanger;
use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Modal\ModalDanger;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Components\Modal\ModalSuccess;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Action;

class BaseModals extends Widget
{
    protected $toolbar;

    public function loadHtml(): void
    {
        $this->createToolbar();
        $this->successModal();
        $this->deleteModal();
        $this->editModal();
    }

    protected function createToolbar()
    {
        $this->toolbar = new Toolbar();

        $this->addElement($this->toolbar);
    }

    protected function successModal()
    {
        $modal = new ModalSuccess();
        $modal->setTitle('Success Modal');
        $modal->setContent('Wiesz co robisz?');
        $modal->addElement(new Confirm());

        $button = new ButtonSuccess();
        $button->setTitle('Edit Modal');
        $button->onClick(Action::modalOpen($modal));


        $this->toolbar->addElement($button);
    }

    protected function deleteModal()
    {
        $modal = new ModalDanger();
        $modal->setTitle('Delete Modal');
        $modal->setContent('Content');

        $button = new ButtonDanger();
        $button->setTitle('Delete Modal');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }

    protected function editModal()
    {
        $modal = new ModalEdit();
        $modal->setTitle('Edit Modal');
        $modal->setContent('Content');

        $alert = new AlertDanger();
        $alert->setOutline();
        $alert->setText('Danger!');
        $modal->addElement($alert);

        $button = new ButtonPrimary();
        $button->setTitle('Edit Modal');
        $button->onClick(Action::modalOpen($modal));

        $this->toolbar->addElement($button);
    }
}