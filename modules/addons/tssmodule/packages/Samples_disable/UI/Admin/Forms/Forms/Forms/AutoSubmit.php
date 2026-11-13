<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxAutoSubmitInterface;

class AutoSubmit extends AbstractForm /*implements AjaxAutoSubmitInterface*/
{
    public function loadHtml(): void
    {
        $this->setAction('https://google.com');
        $this->setMethod('post');
        $this->setTarget('_blank');
    }
}
