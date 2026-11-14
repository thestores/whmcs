<?php

namespace ModulesGarden\TSSPlugin\Components\MediaLibrary\Elements;

use ModulesGarden\TSSPlugin\Components\Form\Form;


abstract class UploadForm extends Form
{
    protected const UPLOAD_ACTION = 'upload';
    protected $providerAction = self::UPLOAD_ACTION;

 
}
