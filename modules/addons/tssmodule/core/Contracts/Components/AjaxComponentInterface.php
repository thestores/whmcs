<?php

namespace ModulesGarden\tssmodule\Core\Contracts\Components;

interface AjaxComponentInterface
{
    public function loadData(): void;

    public function returnAjaxData();
}
