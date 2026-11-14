<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts\Components;

interface AjaxComponentInterface
{
    public function loadData(): void;

    public function returnAjaxData();
}
