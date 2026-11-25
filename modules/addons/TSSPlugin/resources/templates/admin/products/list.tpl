{*
    The products list as every change puts it back into #tss-products: the message of the last action, the two
    filters (imported or not, validation level; each button shows how many products it would list), the table.
*}
{include file='admin/partials/flash.tpl'}

<span class="tss-html">
    <div class="tss-filters">
        {foreach $filters as $filter}
            <div class="tss-show" role="group" aria-label="{$filter.label}">
                {foreach $filter.choices as $choice}
                    <a class="mod-btn mod-btn--sm {if $choice.current}mod-btn--primary{else}mod-btn--default mod-btn--outline{/if}" href="{$choice.url}"
                       hx-get="{$choice.url}" hx-target="#tss-products" hx-swap="innerHTML" hx-push-url="true"{if $choice.current} aria-current="page"{/if}>{$choice.text} <b>{$choice.count}</b></a>
                {/foreach}
            </div>
        {/foreach}
    </div>
</span>

{include file='admin/partials/table.tpl'}
