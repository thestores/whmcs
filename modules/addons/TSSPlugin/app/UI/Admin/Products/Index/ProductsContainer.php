<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index;

use ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\ArrayDataProvider\DataTable;
use ModulesGarden\TSSPlugin\Components\Alert\Alert;
use ModulesGarden\TSSPlugin\App\Http\Admin\Products as ProductsController;
use ModulesGarden\TSSPlugin\Components\Alert\AlertDanger;
use ModulesGarden\TSSPlugin\Components\Alert\AlertInfo;
use ModulesGarden\TSSPlugin\Components\Alert\AlertSuccess;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\App\Libs\Icons;
use ModulesGarden\TSSPlugin\App\Libs\CatalogueSync;
use ModulesGarden\TSSPlugin\Components\Tab\Tab;
use ModulesGarden\TSSPlugin\Components\TabsWidget\TabsWidget;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

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

        $productsTab = new Tab();
        $productsTab->setTitle($this->translate('productsTab', [], ['admin.products']));
        // the other vendor's exclusive products (App\Libs\CrossVendor): the banner shows until it is connected
        if(\ModulesGarden\TSSPlugin\App\Libs\Edition::connectedVendor() === '')
        {
            $other  = \ModulesGarden\TSSPlugin\App\Libs\Edition::otherVendor();
            $banner = new Text();
            $banner->setCss('tss-html');
            $banner->setText('<div class="tss-explain tss-explain--connect"><span class="tss-explain__icon">' . Icons::svg('package-variant-closed') . '</span><div>'
                . '<h3>' . htmlspecialchars((string)$this->translate('connect_title_' . $other, [], ['admin.products']), ENT_QUOTES) . '</h3>'
                . '<p>' . htmlspecialchars((string)$this->translate('connect_text_' . $other, [], ['admin.products']), ENT_QUOTES)
                . ' <a href="addonmodules.php?module=TSSPlugin&amp;mg-page=settings&amp;settings-page=apiSettings">'
                . htmlspecialchars((string)$this->translate('connect_link', [], ['admin.products']), ENT_QUOTES) . '</a></p></div></div>');
            $productsTab->addElement($banner);
        }
        if(!\ModulesGarden\TSSPlugin\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('tss-html');
            $text->setText($this->explanation());
            $productsTab->addElement($text);
        }
        $productsTab->addElement(new DataTable());

        // what changed in the provider's catalogue (M-16)
        $changes = CatalogueSync::recent();
        $week    = date('Y-m-d H:i:s', strtotime('-7 days'));
        $recent  = 0;
        foreach($changes as $change)
        {
            $recent += $change->created_at >= $week ? 1 : 0;
        }
        $changesTab = new Tab();
        $changesTab->setTitle($this->translate('catalogueTab', [], ['admin.products']) . ($recent ? ' (' . $recent . ')' : ''));
        $changesText = new Text();
        $changesText->setCss('tss-html');
        $changesText->setText($this->changesHtml($changes));
        $changesTab->addElement($changesText);

        $tabs = new TabsWidget();
        $tabs->addTab($productsTab);
        $tabs->addTab($changesTab);
        $this->addElement($tabs);
    }

    /** The catalogue changes of the last 90 days, newest first */
    protected function changesHtml($changes): string
    {
        $t     = function($key, array $vars = []) { return htmlspecialchars((string)$this->translate($key, $vars, ['admin.products']), ENT_QUOTES); };
        $h     = function($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); };

        $html = '<div class="tss-changes"><p class="tss-changes__intro">' . $t('catalogue_intro', [':days' => CatalogueSync::TAB_DAYS])
            . ' ' . $t('catalogue_mode', [':mode' => (string)$this->translate('catalogueSync_' . CatalogueSync::mode(), [], ['admin.settings.index.providers.finance_settings_provider'])])
            . ' <a href="addonmodules.php?module=TSSPlugin&amp;mg-page=settings&amp;settings-page=financeSettings">' . $t('catalogue_settings') . '</a></p>';

        if(!count($changes))
        {
            return $html . '<p class="tss-changes__empty">' . $t('catalogue_empty') . '</p></div>';
        }

        $labels = CatalogueSync::typeLabels();
        $html  .= '<div class="tss-changes__scroll"><table class="tss-changes__table"><thead><tr><th>' . $t('catalogue_date') . '</th><th>' . $t('catalogue_type') . '</th><th>' . $t('catalogue_product')
            . '</th><th>' . $t('catalogue_change') . '</th><th>' . $t('catalogue_before') . '</th><th>' . $t('catalogue_now') . '</th><th>' . $t('catalogue_action') . '</th></tr></thead><tbody>';
        foreach($changes as $row)
        {
            $product = $h($row->product_name !== '' ? $row->product_name : $row->remote_id);
            if((int)$row->whmcs_pid)
            {
                $product = '<a href="configproducts.php?action=edit&amp;id=' . (int)$row->whmcs_pid . '">' . $product . '</a> <span class="tss-changes__muted">#' . (int)$row->whmcs_pid . '</span>';
            }
            $html .= '<tr><td class="tss-changes__date">' . $h(substr((string)$row->created_at, 0, 16)) . '</td>'
                . '<td><span class="tss-changes__badge tss-changes__badge--' . $h($row->type) . '">' . $h($labels[$row->type] ?? $row->type) . '</span></td>'
                . '<td>' . $product . ' <span class="tss-changes__muted">' . $h($row->vendor) . '</span></td>'
                . '<td>' . $h($row->field !== '' ? CatalogueSync::fieldLabel($row->field) : '') . '</td>'
                . '<td>' . $h($row->old_value) . '</td><td>' . $h($row->new_value) . '</td><td>' . $h($row->action) . '</td></tr>';
        }

        return $html . '</tbody></table></div></div>';
    }

    /** What the page is for and what the actions in the Manage column do */
    protected function explanation(): string
    {
        $t    = function($key, array $vars = []) { return htmlspecialchars((string)$this->translate($key, $vars, ['admin.products']), ENT_QUOTES); };
        $item = function($key, $text = null) use ($t) { return '<li><b>' . $t($key . '_name') . '</b>: ' . $t($text ?? $key) . '</li>'; };

        // with the other vendor connected (App\Libs\CrossVendor) the list holds the products of both vendors
        $connected = \ModulesGarden\TSSPlugin\App\Libs\Edition::connectedVendor();
        $intro     = $connected !== '' ? $t('about_intro_connected', [':brand' => \ModulesGarden\TSSPlugin\App\Libs\Edition::brandOf($connected)]) : $t('about_intro');

        return '<div class="tss-explain"><span class="tss-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $intro . '</p>'
            . '<ul>' . $item('about_import') . $item('about_hide') . $item('about_retire') . $item('about_fix', $connected !== '' ? 'about_fix_connected' : null) . $item('about_cancel') . '</ul>'
            . '</div></div>';
    }
}
