<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts;

interface QueryProviderInterface extends RecordsListProviderInterface
{
    public function setQuery($query): self;
}
