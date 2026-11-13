<?php

namespace ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;

class ProductAddon extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\tssmodule\Core\WHMCS\Models\Addon::class;

    public function generateUrl(): string
    {
        return URL\Admin::productAddonConfig($this->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode($model->name);
    }
}