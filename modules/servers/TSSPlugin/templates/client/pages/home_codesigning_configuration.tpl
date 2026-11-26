{if $allOk === true}
<div class="validate-ssl-unified tss-cert tss-smime">

    <section class="tss-card tss-hero tss-hero--wait">
        <div class="tss-hero__head">
            <span class="tss-hero__icon">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="m18 16 4-4-4-4M6 8l-4 4 4 4M14.5 4l-5 16"/></svg>
            </span>
            <div class="tss-hero__title">
                <span class="tss-badge tss-badge--wait">{$text->t('smimeAwaitingOrder')}</span>
                <h3>{$productName|escape}</h3>
                <p class="tss-hero__domain">{if $csRenewal}{$text->t('csRenewalIntro')}{else}{$text->t('csConfigurationIntro')}{/if}</p>
                {if $csCurrentValidTill}<p class="tss-hero__domain">{$text->t('smimeCurrentValid')|sprintf:$csCurrentValidTill}</p>{/if}
            </div>
        </div>
    </section>

    <div id="tss-cs-alerts">
        {if $csError}<div class="alert alert-danger" role="alert">{$csError}</div>{/if}
    </div>

    {if !$csError}
    <form id="tss-cs-form" autocomplete="off" onsubmit="return false;" novalidate>

        {* ---------- Delivery ---------- *}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><rect width="20" height="12" x="2" y="6" rx="2"/><path d="M12 12h.01M17 12h.01M7 12h.01"/></svg>
                {$text->t('csDeliverySection')}
            </h4>
            <div class="tss-form">
                {if $csFixedMethod}
                    <p class="tss-note tss-note--plain">{$text->t('csDeliveryChosen')} <strong>{$csFixedLabel}{if $csShippingLabel} ({$csShippingLabel|escape}){/if}</strong></p>
                    <input type="hidden" name="cs_method" value="{$csFixedMethod|escape:'htmlall'}">
                {else}
                    {if $csRenewal}<p class="tss-note tss-note--plain">{$text->t('csRenewalInfo')}</p>{/if}
                    <div class="tss-field">
                        <label>{$text->t('csDeliveryLabel')} <span class="tss-req">*</span></label>
                        {foreach from=$csMethods key=method item=label name=methods}
                            <label class="tss-check">
                                <input type="radio" name="cs_method" value="{$method|escape:'htmlall'}" required{if ($csPreviousMethod && $method == $csPreviousMethod) || (!$csPreviousMethod && $smarty.foreach.methods.first)} checked{/if}>
                                <span>{$label}</span>
                            </label>
                        {/foreach}
                    </div>
                {/if}

                <div class="tss-field" data-tss-cs-for="ship-token">
                    <p class="tss-note">{$text->t('csShipTokenHint')}</p>
                </div>
                <div class="tss-field" data-tss-cs-for="existing-token">
                    <label for="tss-cs-model">{$text->t('csTokenModelLabel')} <span class="tss-req">*</span></label>
                    <select id="tss-cs-model" name="cs_model" class="form-control">
                        <option value="">-</option>
                        {foreach from=$csTokenModels key=code item=name}<option value="{$code|escape:'htmlall'}">{$name|escape}</option>{/foreach}
                    </select>
                    <small>{$text->t('csTokenModelHint')}</small>
                </div>
                <div class="tss-field" data-tss-cs-for="hsm">
                    <label for="tss-cs-csr">{$text->t('csCsrLabel')} <span class="tss-req">*</span></label>
                    <textarea id="tss-cs-csr" name="cs_csr" class="form-control tss-mono" rows="6" placeholder="-----BEGIN CERTIFICATE REQUEST-----"></textarea>
                    <small>{$text->t('csCsrHint')}</small>
                </div>
                {if $csHsmModels}
                    <div class="tss-field" data-tss-cs-for="hsm">
                        <label for="tss-cs-hsm-model">{$text->t('csHsmModelLabel')} <span class="tss-req">*</span></label>
                        <select id="tss-cs-hsm-model" name="cs_hsm_model" class="form-control" required>
                            <option value="">-</option>
                            {foreach from=$csHsmModels key=code item=name}<option value="{$code|escape:'htmlall'}">{$name|escape}</option>{/foreach}
                        </select>
                    </div>
                    <div class="tss-field" data-tss-cs-for="hsm">
                        <label for="tss-cs-attestation">{$text->t('csAttestationLabel')} <span class="tss-req">*</span></label>
                        <textarea id="tss-cs-attestation" name="cs_attestation" class="form-control tss-mono" rows="4" required></textarea>
                        <small>{$text->t('csAttestationHint')}</small>
                    </div>
                {/if}
            </div>
        </section>

        {* ---------- Organization ---------- *}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                {$text->t('csOrganizationSection')}
            </h4>
            <div class="tss-form">
                <p class="tss-note tss-note--plain">{$text->t('csOrganizationHint')}</p>
                <div class="tss-fields">
                    <div class="tss-field"><label for="tss-cs-org-name">{$text->t('csOrg_name')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-name" name="org[name]" class="form-control" required value="{$csClient.companyname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-phone">{$text->t('csOrg_phone')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-phone" name="org[phone]" class="form-control" required value="{$csClient.phonenumber|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-address1">{$text->t('csOrg_address_line_1')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-address1" name="org[address_line_1]" class="form-control" required value="{$csClient.address1|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-address2">{$text->t('csOrg_address_line_2')}</label><input type="text" id="tss-cs-org-address2" name="org[address_line_2]" class="form-control" value="{$csClient.address2|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-city">{$text->t('csOrg_city')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-city" name="org[city]" class="form-control" required value="{$csClient.city|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-region">{$text->t('csOrg_region')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-region" name="org[region]" class="form-control" required value="{$csClient.state|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-postal">{$text->t('csOrg_postal_code')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-org-postal" name="org[postal_code]" class="form-control" required value="{$csClient.postcode|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-org-country">{$text->t('csOrg_country')} <span class="tss-req">*</span></label>
                        {if $csCountries}
                            <select id="tss-cs-org-country" name="org[country]" class="form-control" required>
                                {foreach from=$csCountries key=code item=name}<option value="{$code|escape:'htmlall'}"{if $code == $csClient.country} selected{/if}>{$name|escape}</option>{/foreach}
                            </select>
                        {else}
                            <input type="text" id="tss-cs-org-country" name="org[country]" class="form-control" required maxlength="2" value="{$csClient.country|escape:'htmlall'}">
                        {/if}
                    </div>
                </div>
            </div>
        </section>

        {* ---------- Administrator ---------- *}
        <section class="tss-card">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                {$text->t('csAdministratorSection')}
            </h4>
            <div class="tss-form">
                <p class="tss-note tss-note--plain">{$text->t('csAdministratorHint')}</p>
                <div class="tss-fields">
                    <div class="tss-field"><label for="tss-cs-admin-first">{$text->t('csAdmin_first_name')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-admin-first" name="admin[first_name]" class="form-control" required value="{$csClient.firstname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-admin-last">{$text->t('csAdmin_last_name')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-admin-last" name="admin[last_name]" class="form-control" required value="{$csClient.lastname|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-admin-title">{$text->t('csAdmin_title')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-admin-title" name="admin[title]" class="form-control" required></div>
                    <div class="tss-field"><label for="tss-cs-admin-email">{$text->t('csAdmin_email')} <span class="tss-req">*</span></label><input type="email" id="tss-cs-admin-email" name="admin[email]" class="form-control" required value="{$csClient.email|escape:'htmlall'}"></div>
                    <div class="tss-field"><label for="tss-cs-admin-phone">{$text->t('csAdmin_phone')} <span class="tss-req">*</span></label><input type="text" id="tss-cs-admin-phone" name="admin[phone]" class="form-control" required value="{$csClient.phonenumber|escape:'htmlall'}"></div>
                </div>
                <label class="tss-check">
                    <input type="checkbox" name="admin[same_address]" value="1" checked data-tss-cs-toggle="admin">
                    <span>{$text->t('csAdminSameAddress')}</span>
                </label>
                <div class="tss-fields" data-tss-cs-address="admin" hidden>
                    <div class="tss-field"><label>{$text->t('csAdmin_address_line_1')}</label><input type="text" name="admin[address_line_1]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csAdmin_address_line_2')}</label><input type="text" name="admin[address_line_2]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csAdmin_city')}</label><input type="text" name="admin[city]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csAdmin_region')}</label><input type="text" name="admin[region]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csAdmin_postal_code')}</label><input type="text" name="admin[postal_code]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csAdmin_country')}</label><input type="text" name="admin[country]" class="form-control" maxlength="2"></div>
                </div>
            </div>
        </section>

        {* ---------- Token shipping address (new token) ---------- *}
        <section class="tss-card" data-tss-cs-for="ship-token">
            <h4 class="tss-card__title">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62l-3.48-4.35A1 1 0 0 0 17.52 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></svg>
                {$text->t('csShippingSection')}
            </h4>
            <div class="tss-form">
                <label class="tss-check">
                    <input type="checkbox" name="ship[same_address]" value="1" checked data-tss-cs-toggle="ship">
                    <span>{$text->t('csShipSameAddress')}</span>
                </label>
                <div class="tss-fields" data-tss-cs-address="ship" hidden>
                    <div class="tss-field"><label>{$text->t('csShip_first_name')}</label><input type="text" name="ship[first_name]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_last_name')}</label><input type="text" name="ship[last_name]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_address_line_1')}</label><input type="text" name="ship[address_line_1]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_address_line_2')}</label><input type="text" name="ship[address_line_2]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_city')}</label><input type="text" name="ship[city]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_region')}</label><input type="text" name="ship[region]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_postal_code')}</label><input type="text" name="ship[postal_code]" class="form-control"></div>
                    <div class="tss-field"><label>{$text->t('csShip_country')}</label><input type="text" name="ship[country]" class="form-control" maxlength="2"></div>
                </div>
            </div>
        </section>

        <p class="tss-note tss-note--block">{$text->t('csValidationInfo')}</p>

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
            <button id="tss-cs-submit" type="button" class="tss-btn tss-btn--primary">
                <svg class="tss-ic" viewBox="0 0 24 24" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                <span>{$text->t('csSubmitOrder')}</span>
            </button>
        </div>
    </form>
    {/if}
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
        tssCsSync();
    });

    // shows the parts of the chosen delivery method and the own-address fields
    function tssCsSync() {
        var form = $('#tss-cs-form');
        var method = form.find('[name="cs_method"]:checked').val() || form.find('input[type="hidden"][name="cs_method"]').val() || '';
        form.find('[data-tss-cs-for]').each(function () {
            var off = $(this).attr('data-tss-cs-for') !== method;
            $(this).prop('hidden', off).find('[required]').prop('disabled', off);
        });
        form.find('[data-tss-cs-toggle]').each(function () {
            form.find('[data-tss-cs-address="' + $(this).attr('data-tss-cs-toggle') + '"]').prop('hidden', $(this).is(':checked'));
        });
    }
    $(document).on('change', '#tss-cs-form [name="cs_method"], #tss-cs-form [data-tss-cs-toggle]', tssCsSync);

    $(document).on('click', '#tss-cs-submit', function () {
        var form   = document.getElementById('tss-cs-form');
        var alerts = $('#tss-cs-alerts');
        var btn    = $(this);
        var label  = btn.find('span');
        var text   = label.text();

        alerts.html('');
        if (typeof form.reportValidity === 'function' && !form.reportValidity()) {
            return;
        }

        // only the fields of the chosen delivery and the visible address blocks
        var data = $(form).find(':input').filter(function () {
            return !$(this).closest('[hidden]').length;
        }).serializeArray();
        data.push({ldelim}name: 'mod-action', value: 'createCodeSigning'{rdelim});
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
            alerts.html($('<div class="alert alert-success" role="alert"></div>').text((payload.data && payload.data.message) || '{$text->t('csOrderedSuccessfully')|escape:'javascript'}'));
            window.setTimeout(function () {
                window.location.href = 'clientarea.php?action=productdetails&id={$serviceid}';
            }, 1200);
        }).fail(function () {
            fail('{$text->t('smimeErrorOccurred')|escape:'javascript'}');
        });
    });
</script>
{/if}
