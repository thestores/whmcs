<?php

namespace ModulesGarden\tssmodule\Components\MediaLibrary\Elements;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;

abstract class RemoveForm extends Form implements AjaxComponentInterface
{
    protected string $providerAction = CrudProvider::ACTION_DELETE;
}
