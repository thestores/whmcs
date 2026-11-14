<?php

namespace ModulesGarden\TSSPlugin\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\TSSPlugin\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\TSSPlugin\Core\WHMCS\URL;

class Service extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\TSSPlugin\Core\WHMCS\Models\Service::class;

    public function generateUrl(): string
    {
        $model = $this->getModel();

        $parameters['productselect'] = $model->id;

        return URL\Admin::clientServices($model->userid, $parameters);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->id . ' ' . $model->product->name . (!empty($model->domain) ? " ({$model->domain})" : ""));
    }
}