<?php

namespace ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\tssmodule\Core\Components\Traits\TranslatorTrait;
use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\RelatedItem;
use ModulesGarden\tssmodule\Core\WHMCS\URL;

class Invoice extends ItemTypeWithModel
{
    use TranslatorTrait;

    protected static string $modelClass = \ModulesGarden\tssmodule\Core\WHMCS\Models\Invoice::class;

    public function generateUrl(): string
    {
        $this->getModel();

        return URL\Admin::invoices($this->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->invoicenum ?: $model->id . " " . $this->translate(RelatedItem::TYPE_INVOICE));
    }
}