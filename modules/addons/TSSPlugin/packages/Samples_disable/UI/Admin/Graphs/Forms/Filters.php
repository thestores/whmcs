<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Graphs\Forms;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

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
