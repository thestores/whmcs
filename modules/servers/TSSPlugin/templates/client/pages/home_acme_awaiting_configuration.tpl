<script type="text/javascript" src="{$assetsURL}/js/client.js"></script>

{if $allOk === true}
<div class="validate-ssl-unified tss-cert">

    <section class="tss-card tss-hero tss-hero--wait">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--wait">{$text->t('Awaiting Configuration')}</span>
                <h3>{$productName|escape}</h3>
                <p class="tss-hero__domain">{$text->t('acmeSubscriptionConfigurationInfo')}</p>
            </div>
        </div>
        <div class="tss-hero__foot">
            <div class="tss-actions">
                <a class="tss-btn tss-btn--primary" href="{$configurationURL|escape:'htmlall'}">
                    <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                    {$text->t('configureNow')}
                </a>
            </div>
        </div>
    </section>

    <section class="tss-card">
        <h4 class="tss-card__title">
            <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8M16 13H8M16 17H8"/></svg>
            {$text->t('acmeOrderStatus')}
        </h4>
        <dl class="tss-dl">
            <dt>{$text->t('acmeProductName')}</dt><dd>{$productName|escape}</dd>
            <dt>{$text->t('configurationStatus')}</dt><dd><span class="tss-badge tss-badge--wait">{$text->t('Awaiting Configuration')}</span></dd>
        </dl>
    </section>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var clone = $('.validate-ssl-unified').clone();
        $('.product-details').html(clone);
        $('.mod-module .validate-ssl-unified').remove();
        // the rest of the page and the messages go along (main.tpl)
        modPageRestToOverview();
        // the module's stylesheet lives in the block below and has to survive it
        $('head').append($('link[href*="theme.css"]').first());
        // WHMCS's own tab strip under the page: the module shows everything above it
        $('.product-details').closest('.tab-pane').find('> .nav-tabs, > .tab-content').remove();
    });
</script>
{/if}
