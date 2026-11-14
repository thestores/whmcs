<div class="validate-ssl-unified tss-cert">

    {* ---------- Hero: the certificate waits for the client's order details ---------- *}
    <section class="tss-card tss-hero tss-hero--wait">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M12 8v4M12 16h.01"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--wait">{$MGLANG->T('awaiting_configuration', 'Ready to set up')}</span>
                <h3>{$product_name|escape}</h3>
                {if $domain}
                    <p class="tss-hero__domain">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
                        {$domain|escape}
                    </p>
                {/if}
            </div>
        </div>
        <div class="tss-hero__foot">
            <p>{$MGLANG->T('awaiting_configuration', 'desc')}</p>
            <div class="tss-actions">
                <a class="tss-btn tss-btn--primary" href="{$url|escape}">
                    <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                    {$MGLANG->T('awaiting_configuration', 'Set Up')}
                </a>
            </div>
        </div>
    </section>

    <div class="tss-grid">
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8M16 13H8M16 17H8"/></svg>
                {$MGLANG->T('validation_page', 'cardCertificate')}
            </h4>
            <dl class="tss-dl">
                <dt>{$MGLANG->T('awaiting_configuration', 'Domain Name')}</dt>
                <dd>{if $domain}{$domain|escape}{else}{$MGLANG->T('awaiting_configuration', 'N/A')}{/if}</dd>
                <dt>{$MGLANG->T('awaiting_configuration', 'Status')}</dt>
                <dd><span class="tss-badge tss-badge--wait">{$MGLANG->T('awaiting_configuration', 'Ready to set up')}</span></dd>
                <dt>{$MGLANG->T('awaiting_configuration', 'order_number')}</dt>
                <dd>{if $order_number}<span class="tss-mono">{$order_number|escape}</span>{else}{$MGLANG->T('awaiting_configuration', 'N/A')}{/if}</dd>
                <dt>{$MGLANG->T('awaiting_configuration', 'Valid from')}</dt>
                <dd>{$MGLANG->T('awaiting_configuration', 'N/A')}</dd>
                <dt>{$MGLANG->T('awaiting_configuration', 'Valid to')}</dt>
                <dd>{$MGLANG->T('awaiting_configuration', 'N/A')}</dd>
            </dl>
        </section>

        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2"/><path d="M2 10h20"/></svg>
                {$MGLANG->T('validation_page', 'cardBilling')}
            </h4>
            <dl class="tss-dl">
                <dt>{$MGLANG->T('validation_page', 'RegistrationDate')}</dt>
                <dd>{if $billing.registration}{$billing.registration}{else}{$MGLANG->T('awaiting_configuration', 'N/A')}{/if}</dd>
                <dt>{$MGLANG->T('smimeNextDue')}</dt>
                <dd>{if $billing.nextDue}{$billing.nextDue}{else}{$MGLANG->T('awaiting_configuration', 'N/A')}{/if}</dd>
                <dt>{$MGLANG->T('validation_page', 'ReccuringAmount')}</dt>
                <dd>{$billing.amount}</dd>
                <dt>{$MGLANG->T('validation_page', 'BillingCycle')}</dt>
                <dd>{$billing.cycle|escape}</dd>
            </dl>
        </section>
    </div>
</div>

<script>
    $(document).ready(function () {
        var clone = $('.validate-ssl-unified').clone();
        $('.product-details').html(clone);
        $('.mg-module .validate-ssl-unified').remove();
        // the module's stylesheet lives in the block below and has to survive it
        $('head').append($('link[href*="theme.css"]').first());
        // WHMCS's own tab strip under the page: the module shows everything above it
        $('.product-details').closest('.tab-pane').find('> .nav-tabs, > .tab-content').remove();
    });
</script>
