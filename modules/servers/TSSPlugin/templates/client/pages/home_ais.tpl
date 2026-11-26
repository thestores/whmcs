<script type="text/javascript" src="{$assetsURL}/js/client.js"></script>

{if $allOk === true}
<div class="validate-ssl-unified tss-cert">

    {if $subscription && $subscription->status}
        {assign var=aisStatus value=$subscription->status|lower}
    {else}
        {assign var=aisStatus value='pending'}
    {/if}
    {if $aisStatus == 'active'}{assign var=aisTone value='ok'}
    {elseif $aisStatus == 'cancelled' || $aisStatus == 'terminated'}{assign var=aisTone value='off'}
    {else}{assign var=aisTone value='wait'}{/if}

    {* ---------- Hero: subscription state, the way in, and the actions ---------- *}
    <section class="tss-card tss-hero tss-hero--{$aisTone}">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--{$aisTone}">{$aisStatus|capitalize|escape}</span>
                <h3>{$productName|escape}</h3>
                {if $subscription && $subscription->autoinstall_status && $aisInstallMethod != 'acme'}
                    <p class="tss-hero__domain">{$text->t('aisAutoinstallStatus')}: {$subscription->autoinstall_status|capitalize|escape}</p>
                {/if}
            </div>
        </div>
        <div class="tss-hero__foot">
            <div class="tss-actions">
                {if $subscription && $aisInstallMethod != 'acme' && $subscription->login_sso_link}
                    <a class="tss-btn tss-btn--primary" href="{$subscription->login_sso_link|escape:'htmlall'}" target="_blank" rel="noopener">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                        {$text->t('aisLoginLink')}
                    </a>
                {/if}
                {if $subscription && $aisInstallMethod != 'acme' && $subscription->manage_sso_link}
                    <a class="tss-btn" href="{$subscription->manage_sso_link|escape:'htmlall'}" target="_blank" rel="noopener">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                        {$text->t('aisManageLink')}
                    </a>
                {/if}
                <button id="ais-refresh" type="button" class="tss-btn">
                    <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                    {$text->t('aisRefreshDetails')}
                </button>
                {if $subscription && $subscription->api_order_id}
                    {if $aisAutoRenew}
                        <button id="ais-stop-auto-renewal" type="button" class="tss-btn">{$text->t('aisStopAutoRenewal')}</button>
                    {/if}
                    {if $subscription->status|lower != 'cancelled'}
                        {if $aisCanSwitch}
                            <button id="ais-switch-method" type="button" class="tss-btn" data-method="{if $aisInstallMethod == 'acme'}autoinstall{else}acme{/if}">
                                {if $aisInstallMethod == 'acme'}{$text->t('aisSwitchToAutoinstall')}{else}{$text->t('aisSwitchToAcme')}{/if}
                            </button>
                        {/if}
                        {if !$endsAtPeriodEnd}
                            <button id="ais-cancel-subscription" type="button" class="tss-btn tss-btn--danger">{$text->t('aisCancelSubscription')}</button>
                        {/if}
                    {/if}
                {/if}
            </div>
            {if $endsAtPeriodEnd}<p class="tss-note" id="ais-ends-note">{$endsAtPeriodEndNote}</p>{/if}
            {if $renewalUnpaid}<p class="tss-note" id="ais-renewal-unpaid">{$text->t('subscriptionRenewalUnpaid')}</p>{/if}
        </div>
    </section>

    <div class="tss-grid">
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8M16 13H8M16 17H8"/></svg>
                {$text->t('aisOrderStatus')}
            </h4>
            <dl class="tss-dl">
                <dt>{$text->t('aisProductName')}</dt><dd>{$productName|escape}</dd>
                {if $subscription}
                    {if $subscription->renewal_date}<dt>{$text->t('aisRenewalDate')}</dt><dd>{$subscription->renewal_date|escape}</dd>{/if}
                    <dt>{$text->t('acmeAutoRenew')}</dt>
                    <dd>{if $aisAutoRenew}<span class="tss-badge">{$text->t('acmeStatusActive')}</span>{else}<span class="tss-badge tss-badge--off">{$text->t('acmeStatusRemoved')}</span>{/if}</dd>
                    <dt>{$text->t('aisInstallMethod')}</dt><dd>{$text->t('aisMethod_'|cat:$aisInstallMethod)}</dd>
                {/if}
            </dl>
        </section>

        {if $subscription && $aisInstallMethod == 'acme'}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 18v3h3l11-11-3-3L2 18z"/><path d="m15 5 4 4"/><circle cx="18" cy="6" r="3"/></svg>
                {$text->t('acmeAccountSection')}
            </h4>
            {if !$subscription->acme_account_id}
            <div class="tss-form"><p class="tss-note tss-note--plain">{$text->t('acmeKeysPending')}</p></div>
            {else}
            <dl class="tss-dl">
                <dt>{$text->t('acmeAccountId')}</dt><dd class="tss-mono">{$subscription->acme_account_id|escape}</dd>
                {if $acmeKeysUsable}
                <dt>{$text->t('acmeEabKid')}</dt><dd class="tss-mono">{$subscription->eab_kid|escape}</dd>
                <dt>{$text->t('acmeEabHmacKey')}</dt><dd class="tss-mono" style="word-break:break-all;">{$subscription->eab_hmac_key|escape}</dd>
                {else}
                <dt>{$text->t('acmeEabKid')}</dt><dd>{$text->t('acmeKeysPending')}</dd>
                {/if}
                <dt>{$text->t('acmeServerUrl')}</dt><dd class="tss-mono" style="word-break:break-all;">{$subscription->server_url|escape}</dd>
            </dl>
            {/if}
        </section>
        {/if}
    </div>

<div class="modal fade" id="aisStopAutoRenewalModal" tabindex="-1" role="dialog" aria-labelledby="aisStopAutoRenewalModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="aisStopAutoRenewalModalLabel">{$text->t('aisStopAutoRenewal')}</h4>
            </div>
            <div class="modal-body">
                {$text->t('aisStopAutoRenewalConfirm')}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{$text->t('Close')}</button>
                <button type="button" class="btn btn-warning" id="aisConfirmStopAutoRenewal">{$text->t('aisStopAutoRenewal')}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aisCancelSubscriptionModal" tabindex="-1" role="dialog" aria-labelledby="aisCancelSubscriptionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="aisCancelSubscriptionModalLabel">{$text->t('aisCancelSubscription')}</h4>
            </div>
            <div class="modal-body">
                {$text->t('aisCancelSubscriptionConfirm')}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{$text->t('Close')}</button>
                <button type="button" class="btn btn-danger" id="aisConfirmCancelSubscription">{$text->t('aisCancelSubscription')}</button>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        var clone = $('.validate-ssl-unified').clone();
        $('.product-details').html(clone);
        $('.mod-module .validate-ssl-unified').remove();
        // the module's stylesheet lives in the block below and has to survive it
        $('head').append($('link[href*="theme.css"]').first());
        // WHMCS's own tab strip under the page: the module shows everything above it
        $('.product-details').closest('.tab-pane').find('> .nav-tabs, > .tab-content').remove();
    });

    $(document).ready(function () {
        var serviceUrl = 'clientarea.php?action=productdetails&id={$serviceid}&json=1';

        function runAction(action, data, options) {
            options = options || {};
            data = data || {};
            data['mod-action'] = action;
            data['token'] = '{$csrfToken}';
            $.post(serviceUrl, data, function (ret) {
                // the JSON answer comes with an application/json header, so jQuery may already have parsed it
                var payload = typeof ret === 'object' ? ret : JSON.parse(String(ret).replace('<JSONRESPONSE#', '').replace('#ENDJSONRESPONSE>', ''));
                if (payload.result === 'error') {
                    var errorMessage = payload.error || 'Error';
                    if (typeof options.onError === 'function') {
                        options.onError(errorMessage, payload);
                    } else {
                        $('#ModAlerts').alerts('error', errorMessage);
                    }
                    return;
                }
                var msg = (payload.data && payload.data.message) ? payload.data.message : 'Done';
                if (typeof options.onSuccess === 'function') {
                    options.onSuccess(payload);
                }
                $('#ModAlerts').alerts('success', msg);
                window.setTimeout(function () { window.location.reload(); }, 1200);
            });
        }

        $('body').on('click', '#ais-refresh', function () {
            runAction('refreshAisDetails', {});
        });

        $('body').on('click', '#ais-switch-method', function () {
            if (!window.confirm('{$text->t('aisSwitchConfirm')|escape:'javascript'}')) {
                return;
            }
            runAction('changeAisInstallMethod', {ldelim}install_method: $(this).data('method'){rdelim});
        });

        $('body').on('click', '#ais-stop-auto-renewal', function () {
            $('#aisStopAutoRenewalModal').modal('show');
        });

        $('body').on('click', '#ais-cancel-subscription', function () {
            $('#aisCancelSubscriptionModal').modal('show');
        });

        $('body').on('click', '#aisConfirmStopAutoRenewal', function () {
            $('#aisStopAutoRenewalModal').modal('hide');
            runAction('stopAisAutoRenewal', {});
        });

        $('body').on('click', '#aisConfirmCancelSubscription', function () {
            $('#aisCancelSubscriptionModal').modal('hide');
            runAction('cancelAisSubscription', {});
        });
    });
</script>
{/if}
