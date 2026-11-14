<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView;

use ModulesGarden\TSSPlugin\Components\AppNavBar\Breadcrumb;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\FormSubmit;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;
use ModulesGarden\TSSPlugin\Core\Components\Actions\PassAjaxData;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\Storage\Resources;
use ModulesGarden\TSSPlugin\Core\UI\Interfaces\ClientArea;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\CronTasks\CronTasks;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Forms\AutoSaveForm;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Forms\ReloadForm;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Modal\Clients;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Modals\Base;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Modals\SwitchersModal;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Overview\Overview;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\ServiceDetails\ServiceDetails;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\ServiceInformation\ServiceInformation;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\SubPages\DataTable\DataTable;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Tabs\Tabs;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Tiles\Tiles;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\TreeView\TreeView;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->popup();
        $this->form();
        $this->buttons();


        $this->addElement(new TreeView());
    }

    protected function popup()
    {
        $button = new ButtonSuccess();
        $button->setTitle('Click Me!');
        $button->onClick(new ModalLoad( new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Modals\Clients()));

        $toolbar = new Toolbar();
        $toolbar->addElement($button);

        $widget = new Widget();
        $widget->setTitle('Popup field reload');
        $widget->addElement($toolbar);

        $this->addElement($widget);
    }

    protected function buttons()
    {
        $button = new ButtonSuccess();
        $button->setTitle('Reload datatable with Ajax Data');
        $button->onClick((new ReloadById('datatable'))->withParams([
            'dupa' => 'from-button'
        ]));

        $toolbar = new Toolbar();
        $toolbar->addElement($button);

        $widget = new Widget();
        $widget->setTitle('Control buttons');
        $widget->addElement($toolbar);

        $this->addElement($widget);
    }

    protected function form()
    {
        $input = new FormInputText();
        $input->setName('dupa');

        $form = new Form();
        $form->onSubmit((new PassAjaxData('datatable')));
        $form->onSubmit(new ReloadById('datatable'));
        $form->addElement($input);
        $form->addElement((new ButtonSubmitSuccess())->setTitle('Send Ajax Data And Reload')->onClick(new FormSubmit($form)));

        $widget = new Widget();
        $widget->addElement($form);

        $this->addElement($widget);
    }
}
