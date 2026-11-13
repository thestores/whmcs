<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView;

use ModulesGarden\tssmodule\Components\AppNavBar\Breadcrumb;
use ModulesGarden\tssmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\tssmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\Storage\Resources;
use ModulesGarden\tssmodule\Core\UI\Interfaces\ClientArea;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\CronTasks\CronTasks;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Forms\AutoSaveForm;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Forms\ReloadForm;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Modal\Clients;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Modals\Base;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Modals\SwitchersModal;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Overview\Overview;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\ServiceDetails\ServiceDetails;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\ServiceInformation\ServiceInformation;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\SubPages\DataTable\DataTable;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Tabs\Tabs;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Tiles\Tiles;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\TreeView\TreeView;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
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
        $button->onClick(new ModalLoad( new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Modals\Clients()));

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
