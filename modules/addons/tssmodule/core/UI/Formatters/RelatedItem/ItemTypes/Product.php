<?php

namespace ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\tssmodule\Core\WHMCS\URL;

class Product extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\tssmodule\Core\WHMCS\Models\Product::class;

    public function generateUrl(): string
    {
        return URL\Admin::productConfig($this->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode($model->name);
    }
}