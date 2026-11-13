<?php

namespace ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Admins;
use ModulesGarden\tssmodule\Core\WHMCS\URL;

class Admin extends ItemTypeWithModel
{
    protected static string $modelClass = Admins::class;

    public function generateUrl(): string
    {
        return URL\Admin::adminSummary($this->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->id . " " . $model->username);
    }
}