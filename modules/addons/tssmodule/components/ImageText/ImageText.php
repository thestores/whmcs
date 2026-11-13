<?php

namespace ModulesGarden\tssmodule\Components\ImageText;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;

class ImageText extends Container
{
    use UrlTrait;
    use TextTrait;

    public const COMPONENT = 'ImageText';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'no_image',
        ]);
    }
}