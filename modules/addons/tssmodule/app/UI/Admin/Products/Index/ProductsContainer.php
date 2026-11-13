<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index;

use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\ArrayDataProvider\DataTable;
use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\App\Http\Admin\Products as ProductsController;
use ModulesGarden\tssmodule\Components\Alert\AlertDanger;
use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Alert\AlertSuccess;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class ProductsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $session = $_SESSION[ProductsController::SESSION] ?? [];
        unset($_SESSION[ProductsController::SESSION]);
        if(!empty($session['error']))
        {
            $this->addElement((new AlertDanger())->setText(htmlspecialchars((string)$session['error'], ENT_QUOTES, 'UTF-8', false)));
        }
        if(!empty($session['notice']))
        {
            $notice = $session['notice'];
            $this->addElement((new AlertSuccess())->setText($this->translate('notice_' . $notice['key'], ['product' => htmlspecialchars((string)$notice['product'], ENT_QUOTES, 'UTF-8', false), 'detail' => $notice['detail'] !== '' ? htmlspecialchars((string)$notice['detail'], ENT_QUOTES, 'UTF-8', false) : '-'])));
        }

        if(!\ModulesGarden\tssmodule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('tss-html');
            $text->setText($this->explanation());
            $this->addElement($text);
        }

        $this->addElement(new DataTable());
    }

    /** What the page is for and what the actions in the Manage column do */
    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key, [], ['admin.products']), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li><b>' . $t($key . '_name') . '</b>: ' . $t($key) . '</li>'; };

        return '<div class="tss-explain"><span class="tss-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $t('about_intro') . '</p>'
            . '<ul>' . $item('about_import') . $item('about_hide') . $item('about_retire') . $item('about_fix') . $item('about_cancel') . '</ul>'
            . '</div></div>';
    }
}
