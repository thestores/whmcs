<?php

namespace ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\tssmodule\Core\WHMCS\URL;

class Domain extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\tssmodule\Core\WHMCS\Models\Domain::class;

    public function generateUrl(): string
    {
        $model = $this->getModel();

        $parameters['id'] = $model->id;

        return URL\Admin::clientDomains($model->userid, $parameters);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->id . ' ' . $model->domain);
    }
}