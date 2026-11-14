<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets;

use ModulesGarden\TSSPlugin\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\TSSPlugin\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms\Form;

class Widget extends \ModulesGarden\TSSPlugin\Components\Widget\Widget
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