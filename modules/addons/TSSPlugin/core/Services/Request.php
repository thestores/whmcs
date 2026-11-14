<?php

namespace ModulesGarden\TSSPlugin\Core\Services;


class Request extends \ModulesGarden\TSSPlugin\Core\Http\Request
{
    public function getAll()
    {
        return $this->request->all();
    }
}
