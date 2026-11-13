<?php

namespace ModulesGarden\tssmodule\Core\Contracts;

interface QueryProviderInterface extends RecordsListProviderInterface
{
    public function setQuery($query): self;
}
