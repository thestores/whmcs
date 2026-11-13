<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\tssmodule\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\Forms\FinalizeForm;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Translation\TranslatorTrait;

class Step6 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        $countProducts = (new ProductRepository())->countProducts();

        \ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 6, $this->translate('step6_title'));

        $text = new Text();
        $text->setCss('title_alert');
        $text->setText($this->translate('title_alert'));
        $this->addElement($text);

        $text = new Text();
        $text->setCss('api_alert');
        $text->setText($this->translate('step6_api'));
        $this->addElement($text);

        $text = new Text();
        $text->setCss('api_alert');
        $text->setText(sprintf($this->translate('step6_products'), $countProducts));
        $this->addElement($text);

        $text = new Text();
        $text->setCss('title_list');
        $text->setText($this->translate('title_list'));
        $this->addElement($text);

        $text = new Text();
        $text->setCss('item_list');
        $text->setText($this->translate('item_list1'));
        $this->addElement($text);

        $text = new Text();
        $text->setCss(['item_list','item_list2']);
        $text->setText($this->translate('item_list2'));
        $this->addElement($text);

        $this->addElement(new FinalizeForm());
    }
}