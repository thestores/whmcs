<?php

namespace ModulesGarden\tssmodule\Core\Services;


class Request extends \ModulesGarden\tssmodule\Core\Http\Request
{
    public function getAll()
    {
        return $this->request->all();
    }
}
