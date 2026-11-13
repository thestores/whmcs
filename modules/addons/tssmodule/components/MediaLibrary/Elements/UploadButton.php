<?php

namespace ModulesGarden\tssmodule\Components\MediaLibrary\Elements;

use ModulesGarden\tssmodule\Components\Button\Button;
use ModulesGarden\tssmodule\Core\Components\Action;

abstract class UploadButton extends Button
{
    protected $css = 'lu-btn';

    public function __construct()
    {
        parent::__construct();
        $this->setTitle($this->translate('upload_image'));
        $this->setCss('lu-btn lu-btn--primary');
    }

    public function setModal(UploadModal $modal)
    {
        $this->onClick(Action::modalOpen($modal));
    }
}
