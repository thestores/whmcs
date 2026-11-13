<?php

namespace ModulesGarden\tssmodule\Components\MediaLibrary\Elements;

use ModulesGarden\tssmodule\Components\Form\Form;


abstract class UploadForm extends Form
{
    protected const UPLOAD_ACTION = 'upload';
    protected $providerAction = self::UPLOAD_ACTION;

 
}
