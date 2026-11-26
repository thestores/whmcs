{if $allOk === true}
<div class="validate-ssl-unified tss-cert tss-smime">

    <div id="tss-ds-alerts">
        {if $flashSuccess}
            <div class="alert alert-success" role="alert">{$flashSuccess}</div>
        {/if}
        {if $flashError}
            <div class="alert alert-danger" role="alert">{$flashError|escape}</div>
        {/if}
        {if $refreshError}
            <div class="alert alert-warning" role="alert">{$text->t('smimeRefreshFailed')} {$refreshError|escape}</div>
        {/if}
    </div>

    <section class="tss-card tss-hero tss-hero--{$dsTone}">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--{$dsTone}">{$dsStatusText|escape}</span>
                <h3>{$productName|escape}</h3>
                {if $dsOrganization}
                    <p class="tss-hero__domain">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                        {$dsOrganization|escape}
                    </p>
                {/if}
            </div>
        </div>
        <div class="tss-hero__foot">
            <p>
                {if $dsEnrollmentLink}{$text->t('dsInfoEnroll')}
                {elseif $dsStatus == 'invited'}{$text->t('dsInfoEnrollEmail')}
                {elseif $dsTokenSetupLink}{$text->t('dsInfoTokenSetup')}
                {elseif $dsStatus == 'active'}
                    {if $dsMethod == 'ship-token'}{$text->t('dsInfoActiveShipToken')}{else}{$text->t('dsInfoActiveExistingToken')}{/if}
                {elseif $dsTone == 'wait'}{$text->t('dsInfoPending')}
                {elseif $dsTone == 'off'}{$text->t('smimeInfoClosed')}
                {else}{$text->t('smimeInfoContactSupport')}{/if}
            </p>
            <div class="tss-actions">
                {if $dsEnrollmentLink || $dsTokenSetupLink}
                    <a class="tss-btn tss-btn--primary" href="{if $dsEnrollmentLink}{$dsEnrollmentLink|escape}{else}{$dsTokenSetupLink|escape}{/if}" target="_blank" rel="noopener">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                        {if $dsEnrollmentLink}{$text->t('smimeEnrollButton')}{else}{$text->t('dsTokenSetupButton')}{/if}
                    </a>
                {/if}
                {if $renewOpen}
                    <button type="button" class="tss-btn tss-btn--primary" data-toggle="modal" data-target="#tssRenewModal">
                        <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                        {$text->t('renewButton')}
                    </button>
                {/if}
                <button id="tss-ds-refresh" type="button" class="tss-btn{if $dsTone == 'wait' && !$dsEnrollmentLink} tss-btn--primary{/if}">
                    <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                    <span>{$text->t('smimeRefreshDetails')}</span>
                </button>
            </div>
        </div>
    </section>

    <div class="tss-grid">
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8M16 13H8M16 17H8"/></svg>
                {$text->t('validation_page', 'cardCertificate')}
            </h4>
            <dl class="tss-dl">
                <dt>{$text->t('dsOrganization')}</dt><dd>{if $dsOrganization}{$dsOrganization|escape}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('dsDelivery')}</dt><dd>{if $dsDelivery}{$dsDelivery|escape}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('validation_page', 'ValidFrom')}</dt><dd>{if $dsValidFrom}{$dsValidFrom}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('validation_page', 'ValidTill')}</dt><dd>{if $dsValidTill}{$dsValidTill}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('smimeOrderedAt')}</dt><dd>{if $dsOrderedAt}{$dsOrderedAt}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('validation_page', 'StoreAPIOrder')}</dt><dd class="tss-mono">{$dsItemId|escape}</dd>
                <dt>{$text->t('validation_page', 'VendorOrderID')}</dt><dd class="tss-mono">{if $dsVendorOrderId}{$dsVendorOrderId|escape}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
            </dl>
        </section>

        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="14" x="2" y="5" rx="2"/><path d="M2 10h20"/></svg>
                {$text->t('validation_page', 'cardBilling')}
            </h4>
            <dl class="tss-dl">
                <dt>{$text->t('validation_page', 'RegistrationDate')}</dt><dd>{if $billing.registration}{$billing.registration}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('smimeNextDue')}</dt><dd>{if $billing.nextDue}{$billing.nextDue}{else}{$text->t('validation_page', 'NA')}{/if}</dd>
                <dt>{$text->t('validation_page', 'ReccuringAmount')}</dt><dd>{$billing.amount}</dd>
                <dt>{$text->t('validation_page', 'BillingCycle')}</dt><dd>{$billing.cycle|escape}</dd>
            </dl>
        </section>
    </div>
    {if $renewOpen}
    <div class="modal fade" id="tssRenewModal" tabindex="-1" role="dialog" aria-labelledby="tssRenewLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="clientarea.php?action=productdetails&id={$serviceid}">
                    <input type="hidden" name="mod-action" value="renewOrder">
                    <input type="hidden" name="token" value="{$csrfToken}">
                    <div class="modal-header" style="display:block;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="tssRenewLabel" style="text-align:left;">{$text->t('renewTitle')}</h4>
                    </div>
                    <div class="modal-body tss-cert" style="text-align:left;">
                        <p>{$text->t('renewIntro')}</p>
                        {if $renewSame}
                            <label class="tss-check">
                                <input type="radio" name="renew_same" value="1" checked data-tss-renew>
                                <span><strong>{$text->t('renewSame')}</strong><br><small>{if $renewIsDs}{$text->t('renewSameHintCs')}{else}{$text->t('renewSameHintSmime')}{/if}</small></span>
                            </label>
                            {if $renewNeedsModel}
                                <div class="tss-field" data-tss-renew-same style="margin:8px 0 0 24px;">
                                    <label for="tss-renew-model">{$text->t('renewModelLabel')} <span class="tss-req">*</span></label>
                                    <select id="tss-renew-model" name="renew_model" class="form-control" required>
                                        <option value="">-</option>
                                        {foreach from=$renewModels key=code item=name}<option value="{$code|escape:'htmlall'}">{$name|escape}</option>{/foreach}
                                    </select>
                                </div>
                            {/if}
                            {if $renewAgreement}
                                <label class="tss-check" data-tss-renew-same style="margin:8px 0 0 24px;">
                                    <input type="checkbox" name="agreement" value="1" required>
                                    <span>{$text->t('sslConfigAgreement')} {if $renewAgreement.url}<a href="{$renewAgreement.url|escape}" target="_blank" rel="noopener">{$renewAgreement.name|escape}</a>{else}{$renewAgreement.name|escape}{/if}</span>
                                </label>
                            {/if}
                            <label class="tss-check" style="margin-top:12px;">
                                <input type="radio" name="renew_same" value="0" data-tss-renew>
                                <span><strong>{$text->t('renewNew')}</strong><br><small>{$text->t('renewNewHint')}</small></span>
                            </label>
                        {else}
                            <input type="hidden" name="renew_same" value="0">
                            <p class="tss-note tss-note--plain">{if $renewIsDs}{$text->t('renewNoSameCs')}{else}{$text->t('renewNewHint')}{/if}</p>
                        {/if}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{$text->t('validation_page', 'Close')}</button>
                        <button type="submit" class="btn btn-success">{$text->t('renewCreateInvoice')}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {/if}
</div>

<script type="text/javascript">
    // Renew dialog: the token model and agreement belong to "same details"
    $(document).on('change', '[data-tss-renew]', function () {
        var same = $(this).closest('form').find('[data-tss-renew]:checked').val() === '1';
        $(this).closest('form').find('[data-tss-renew-same]').toggle(same).find(':input').prop('disabled', !same);
    });
    $(document).ready(function () {
        var clone = $('.validate-ssl-unified').clone();
        $('.product-details').html(clone);
        $('.mod-module .validate-ssl-unified').remove();
        // the module's stylesheet lives in the block below and has to survive it
        $('head').append($('link[href*="theme.css"]').first());
        // WHMCS's own tab strip under the page: the module shows everything above it
        $('.product-details').closest('.tab-pane').find('> .nav-tabs, > .tab-content').remove();
    });

    $(document).on('click', '#tss-ds-refresh', function () {
        var btn = $(this), alerts = $('#tss-ds-alerts');
        btn.prop('disabled', true);
        $.post('clientarea.php?action=productdetails&id={$serviceid}&json=1', {ldelim}'mod-action': 'refreshDocumentSigningDetails', token: '{$csrfToken}'{rdelim}, function (ret) {
            var payload;
            try {
                payload = typeof ret === 'object' ? ret : JSON.parse(String(ret).replace('<JSONRESPONSE#', '').replace('#ENDJSONRESPONSE>', ''));
            } catch (e) {
                payload = {ldelim}result: 'error'{rdelim};
            }
            if (payload.result === 'error') {
                alerts.html($('<div class="alert alert-danger" role="alert"></div>').html(payload.error || '{$text->t('smimeErrorOccurred')|escape:'javascript'}'));
                btn.prop('disabled', false);
                return;
            }
            window.location.reload();
        }).fail(function () {
            alerts.html($('<div class="alert alert-danger" role="alert"></div>').text('{$text->t('smimeErrorOccurred')|escape:'javascript'}'));
            btn.prop('disabled', false);
        });
    });
</script>
{/if}
