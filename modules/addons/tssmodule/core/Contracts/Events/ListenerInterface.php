<?php

namespace ModulesGarden\tssmodule\Core\Contracts\Events;

interface ListenerInterface
{
    public function handle($payload = []);
}
