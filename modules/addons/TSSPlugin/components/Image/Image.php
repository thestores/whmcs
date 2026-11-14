<?php

namespace ModulesGarden\TSSPlugin\Components\Image;

use ModulesGarden\TSSPlugin\Core\Components\Traits\UrlTrait;
use ModulesGarden\TSSPlugin\Components\Container\Container;

class Image extends Container
{
    use UrlTrait;

    public const COMPONENT = 'Image';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'no_image',
        ]);
    }
}
