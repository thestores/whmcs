{* The four figures at the top of the dashboard ($tiles), for the period chosen in Settings > General *}
<span class="tss-html">
    <section class="tss-dash__kpis" aria-label="{$period}">
        {foreach $tiles as $tile}
            <article class="tss-kpi">
                <div class="tss-kpi__top"><h3>{$tile.title}</h3>{tile icon=$tile.icon tone=$tile.tone}</div>
                <p class="tss-kpi__value">{$tile.value}</p>
                <p class="tss-kpi__detail">{icon name=$tile.detailIcon}{$tile.detail}</p>
            </article>
        {/foreach}
    </section>
</span>
