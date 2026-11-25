{*
    A Yes / No switch of a form: {include file='admin/partials/yesno.tpl' name='generateInvoice' label={t key=...} on=false}  ($label: escaped HTML)
    The form posts <name>=on or <name>=off. $danger=true shows the chosen "No" in red.
*}
<div class="tss-yn mod-solo">
    {if $label|default:'' !== ''}<span class="mod-check-text"> {$label nofilter} </span>{/if}
    <div role="radiogroup" class="tss-yn__segments">
        <label class="tss-yn__segment">
            <input type="radio" name="{$name}" value="on" class="tss-yn__radio no-icheck"{if $on} checked{/if}{if $disabled|default:false} disabled{/if}>
            <span>{t key='admin.kernel.yes'}</span>
        </label>
        <label class="tss-yn__segment">
            <input type="radio" name="{$name}" value="off" class="tss-yn__radio{if $danger|default:true} tss-yn__radio--danger{/if} no-icheck"{if !$on} checked{/if}{if $disabled|default:false} disabled{/if}>
            <span>{t key='admin.kernel.no'}</span>
        </label>
    </div>
</div>
