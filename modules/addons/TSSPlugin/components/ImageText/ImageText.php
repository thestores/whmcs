<?php

namespace ModulesGarden\TSSPlugin\Components\ImageText;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\UrlTrait;

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