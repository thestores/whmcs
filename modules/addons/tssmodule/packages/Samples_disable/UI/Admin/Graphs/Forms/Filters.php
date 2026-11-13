<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Forms;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class Filters extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $builder = BuilderCreator::simple($this);
        $builder->createField(Dropdown::class, 'coscoscos')->setMultiple(true)->setOptions([
            'xxxx'=>'xxx',
            'yyy'=>'yyy',
            'zzz'=>'zz',
        ]);

    }
}
