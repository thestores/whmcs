<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms;


use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ImportProvider;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ReSyncProvider;
use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Alert\AlertWarning;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Number\Number;
use ModulesGarden\tssmodule\Components\RadioButton\RadioButton;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Tagger\Tagger;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;


class ReSyncForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = ReSyncProvider::class;
        $this->providerAction = ReSyncProvider::ACTION_CREATE;
        $this->providerActionsToValidate = ['create', 'update', 'delete'];
    }

    public function loadHtml(): void
    {

    }
}