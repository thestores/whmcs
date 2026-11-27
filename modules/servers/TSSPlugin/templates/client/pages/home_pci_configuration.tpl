{if $allOk === true}
<div class="validate-ssl-unified tss-cert tss-smime">

    <section class="tss-card tss-hero tss-hero--wait">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M12 8v4M12 16h.01"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--wait">{$text->t('smimeAwaitingOrder')}</span>
                <h3>{$productName|escape}</h3>
                <p class="tss-hero__domain">{$text->t('pciConfigurationIntro')}</p>
            </div>
        </div>
    </section>

    <div id="tss-pci-alerts"></div>

    <form id="tss-pci-form" autocomplete="off" onsubmit="return false;" novalidate>

        {* ---------- Organization ---------- *}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                {$text->t('dsOrganizationSection')}
            </h4>
            <div class="tss-form">
                <p class="tss-note tss-note--plain">{$text->t('pciOrganizationHint')}</p>
                <div class="tss-fields">
                    <div class="tss-field"><label for="tss-pci-org-name">{$text->t('dsOrg_name')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-org-name" name="org[name]" class="form-control" required value="{$smimeClient.companyname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-phone">{$text->t('dsOrg_phone')}</label><input type="text" id="tss-pci-org-phone" name="org[phone]" class="form-control" value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-address1">{$text->t('dsOrg_address_line_1')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-org-address1" name="org[address_line_1]" class="form-control" required value="{$smimeClient.address1|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-address2">{$text->t('dsOrg_address_line_2')}</label><input type="text" id="tss-pci-org-address2" name="org[address_line_2]" class="form-control" value="{$smimeClient.address2|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-city">{$text->t('dsOrg_city')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-org-city" name="org[city]" class="form-control" required value="{$smimeClient.city|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-region">{$text->t('dsOrg_region')}</label><input type="text" id="tss-pci-org-region" name="org[region]" class="form-control" value="{$smimeClient.state|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-postal">{$text->t('dsOrg_postal_code')}</label><input type="text" id="tss-pci-org-postal" name="org[postal_code]" class="form-control" value="{$smimeClient.postcode|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-org-country">{$text->t('dsOrg_country')} <span class="tss-req">*</span></label>
                        {if $smimeCountries}
                            <select id="tss-pci-org-country" name="org[country]" class="form-control" required>
                                {foreach from=$smimeCountries key=code item=name}<option value="{$code|escape:'htmlall'}"{if $code == $smimeClient.country} selected{/if}>{$name|escape}</option>{/foreach}
                            </select>
                        {else}
                            <input type="text" id="tss-pci-org-country" name="org[country]" class="form-control" required maxlength="2" value="{$smimeClient.country|escape:'htmlall'}">
                        {/if}
                    </div>
                </div>
            </div>
        </section>

        {* ---------- Administrator ---------- *}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {$text->t('dsAdministratorSection')}
            </h4>
            <div class="tss-form">
                <p class="tss-note tss-note--plain">{$text->t('pciAdministratorHint')}</p>
                <div class="tss-fields">
                    <div class="tss-field"><label for="tss-pci-admin-first">{$text->t('dsAdmin_first_name')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-admin-first" name="admin[first_name]" class="form-control" required value="{$smimeClient.firstname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-admin-last">{$text->t('dsAdmin_last_name')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-admin-last" name="admin[last_name]" class="form-control" required value="{$smimeClient.lastname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-admin-title">{$text->t('dsAdmin_title')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-admin-title" name="admin[title]" class="form-control" required></div>
                    <div class="tss-field"><label for="tss-pci-admin-email">{$text->t('dsAdmin_email')} <span class="tss-req">*</span></label><input type="email" id="tss-pci-admin-email" name="admin[email]" class="form-control" required value="{$smimeClient.email|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-pci-admin-phone">{$text->t('dsAdmin_phone')} <span class="tss-req">*</span></label><input type="text" id="tss-pci-admin-phone" name="admin[phone]" class="form-control" required value="{$smimeClient.phonenumber|escape:'htmlall'}"></div>
                </div>
            </div>
        </section>

        <p class="tss-note tss-note--block">{$text->t('pciOrderInfo')}</p>

        {if $agreement}
            <section class="tss-card">
                <div class="tss-form tss-agreement">
                    {if $agreement.text}<p class="tss-note tss-note--plain">{$agreement.text}</p>{/if}
                    <label class="tss-check">
                        <input type="checkbox" name="agreement" value="1" required>
                        <span>{$text->t('sslConfigAgreement')} {if $agreement.url}<a href="{$agreement.url|escape}" target="_blank" rel="noopener">{$agreement.name|escape}</a>{else}{$agreement.name|escape}{/if}</span>
                    </label>
                </div>
            </section>
        {/if}

        <div class="tss-actions tss-actions--end">
            <button id="tss-pci-submit" type="button" class="tss-btn tss-btn--primary">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>{$text->t('pciSubmitOrder')}</span>
            </button>
        </div>
    </form>
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

    $(document).on('click', '#tss-pci-submit', function () {
        var form   = document.getElementById('tss-pci-form');
        var alerts = $('#tss-pci-alerts');
        var btn    = $(this);
        var label  = btn.find('span');
        var text   = label.text();

        alerts.html('');
        if (typeof form.reportValidity === 'function' && !form.reportValidity()) {
            return;
        }

        var data = $(form).serializeArray();
        data.push({ldelim}name: 'mod-action', value: 'createPci'{rdelim});
        data.push({ldelim}name: 'token', value: '{$csrfToken}'{rdelim});

        function fail(message) {
            alerts.html($('<div class="alert alert-danger" role="alert"></div>').html(message));
            btn.prop('disabled', false);
            label.text(text);
            window.scrollTo(0, alerts.offset().top - 90);
        }

        btn.prop('disabled', true);
        label.text('{$text->t('smimeOrdering')|escape:'javascript'}');

        $.post('clientarea.php?action=productdetails&id={$serviceid}&json=1', $.param(data), function (ret) {
            var payload;
            try {
                payload = typeof ret === 'object' ? ret : JSON.parse(String(ret).replace('<JSONRESPONSE#', '').replace('#ENDJSONRESPONSE>', ''));
            } catch (e) {
                fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
                return;
            }
            if (payload.result === 'error') {
                fail(payload.error || '{$text->t('smimeErrorOccurred')|escape:'javascript'}');
                return;
            }
            alerts.html($('<div class="alert alert-success" role="alert"></div>').text((payload.data && payload.data.message) || '{$text->t('pciOrderedSuccessfully')|escape:'javascript'}'));
            window.setTimeout(function () {
                window.location.href = 'clientarea.php?action=productdetails&id={$serviceid}';
            }, 1200);
        }).fail(function () {
            fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
        });
    });
</script>
{/if}
