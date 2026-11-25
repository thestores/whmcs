{* Sales and margin of the dashboard period: four figures ($tiles), the margin as a bar, the paid / unpaid split *}
{$w = 'widgets.overview_widget'}
<div class="tss-dcard">
    <span class="tss-html">
        <div class="tss-dcard__head">
            <h3>{tile icon='chart-line' tone='info'}{t key="{$w}.title"}</h3>
            <a class="tss-dcard__aside" href="{url page='statistics'}">{t key="{$w}.statistics"}</a>
        </div>
    </span>
    <span class="tss-html">
        <div class="tss-money">
            {foreach $tiles as $tile}
                <div><span>{icon name=$tile.icon}{$tile.title}</span><b>{$tile.value}</b></div>
            {/foreach}
        </div>
        <div class="tss-money__bar"><i style="width:{$bar}%"></i></div>
        <p class="tss-money__note">{$note}</p>
    </span>
    <span class="tss-html">
        <a class="tss-dcard__foot" href="{url page='pricing'}">{icon name='tag-outline'}<span>{t key="{$w}.pricing"}</span>{icon name='arrow-right'}</a>
    </span>
</div>
