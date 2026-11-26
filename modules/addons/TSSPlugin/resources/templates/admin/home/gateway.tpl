{*
    API connection ($vendors): reachable or not and the response time, per vendor. "Check the connection again"
    reloads only this panel and asks the vendor instead of using the last answer.
*}
{$w = 'widgets.gateway_widget'}
<div class="tss-dcard" id="tss-gateway">
    <span class="tss-html">
        <div class="tss-dcard__head">
            <h3>{if $allOk}{tile icon='power-plug-outline' tone='ok'}{else}{tile icon='power-plug-outline' tone='bad'}{/if}{t key="{$w}.title"}</h3>
        </div>
    </span>
    <span class="tss-html">
        <div class="tss-dcard__rows">
            {foreach $vendors as $vendor}
                {if !$vendor.configured}
                    <div class="tss-row">
                        {icon name='web'}
                        <span class="tss-row__name">{$vendor.name}<small>{t key="{$w}.not_configured_detail"}</small></span>
                        <span class="tss-row__val">{pill tone='bad' label=$labels.notConfigured icon='alert-outline'}</span>
                    </div>
                {else}
                    <div class="tss-row">
                        {icon name='web'}
                        <span class="tss-row__name">{$vendor.name}{if $vendor.error !== ''}<small>{$vendor.error}</small>{/if}</span>
                        <span class="tss-row__val">
                            {if $vendor.ok}{pill tone='ok' label=$labels.connected icon='check'}{else}{pill tone='bad' label=$labels.unreachable icon='close' title=$vendor.error}{/if}
                        </span>
                    </div>
                    <div class="tss-row">
                        {icon name='clock-outline'}
                        <span class="tss-row__name">{t key="{$w}.response"}</span>
                        <span class="tss-row__val"><b>{$vendor.seconds} s</b></span>
                    </div>
                {/if}
            {/foreach}
            <div class="tss-row">
                {icon name='lock-outline'}
                <span class="tss-row__name">{t key="{$w}.credentials"}<small>{t key="{$w}.credentials_detail"}</small></span>
                <span class="tss-row__val"><a class="tss-sbtn" href="{$apiUrl}">{t key="{$w}.manage"}</a></span>
            </div>
        </div>
    </span>
    <span class="tss-html">
        <a class="tss-dcard__foot" href="#" hx-post="{url action='panel' name='gateway'}" hx-target="#tss-gateway" hx-swap="outerHTML">{icon name='refresh'}<span>{t key="{$w}.recheck"}</span></a>
    </span>
</div>
