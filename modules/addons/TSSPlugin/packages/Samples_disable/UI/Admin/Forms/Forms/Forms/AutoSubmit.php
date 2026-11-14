<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxAutoSubmitInterface;

class AutoSubmit extends AbstractForm /*implements AjaxAutoSubmitInterface*/
{
    public function loadHtml(): void
    {
        $this->setAction('https://google.com');
        $this->setMethod('post');
        $this->setTarget('_blank');
    }
}
