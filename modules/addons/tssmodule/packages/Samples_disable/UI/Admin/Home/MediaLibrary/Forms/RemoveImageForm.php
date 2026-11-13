<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\MediaLibrary\Forms;

use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\MediaLibrary\RemoveForm;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\MediaLibrary\Providers\MediaLibraryProvider;

class RemoveImageForm extends RemoveForm
{
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->setProvider(new MediaLibraryProvider());
        $this->addField((new HiddenField('id')));

        $this->provider->read();

    }
}
