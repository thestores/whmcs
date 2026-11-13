<?php

namespace ModulesGarden\tssmodule\Components\Image;

use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;
use ModulesGarden\tssmodule\Components\Container\Container;

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
