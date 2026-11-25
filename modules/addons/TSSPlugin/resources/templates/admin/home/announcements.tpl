{* Announcements of the vendor ($items; body is HTML the library has reduced to a few harmless tags) *}
{$w = 'widgets.announcements_widget'}
<div class="tss-dcard">
    <span class="tss-html">
        <div class="tss-dcard__head">
            <h3>{tile icon='bell-outline'}{t key="{$w}.title"}</h3>
            <span class="tss-dcard__aside">{t key="{$w}.latest"}</span>
        </div>
    </span>
    <span class="tss-html">
        <div class="tss-dcard__body">
            {if $error !== ''}
                <p class="tss-muted">{$error}</p>
            {elseif !$items}
                <p class="tss-muted">{t key="{$w}.none"}</p>
            {else}
                <div class="tss-alerts">
                    {foreach $items as $item}
                        <article class="tss-alertrow">
                            {tile icon=$item.icon tone=$item.tone}
                            <div>
                                <h4>{$item.title}</h4>
                                <div class="tss-alertrow__text">{$item.body nofilter}</div>
                            </div>
                            <time>{$item.date}</time>
                        </article>
                    {/foreach}
                </div>
            {/if}
        </div>
    </span>
</div>
