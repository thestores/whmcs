<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets;

use ModulesGarden\tssmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\tssmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms\Form;

class Widget extends \ModulesGarden\tssmodule\Components\Widget\Widget
{
    public function loadHtml(): void
    {
        $this->setTitle('Download file');

        $button = new ButtonSubmitSuccess();
        $button->onClick(new DownloadFileFromForm(new Form(), [
            'downloadThisFile' => 'ThisFile!'
        ]));
        $button->setTitle('Download');
        $this->addElement($button);
    }
}