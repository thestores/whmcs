<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts\Events;

interface ListenerInterface
{
    public function handle($payload = []);
}
