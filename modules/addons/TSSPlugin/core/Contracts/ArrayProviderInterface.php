<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts;

interface ArrayProviderInterface extends RecordsListProviderInterface
{
    public function setData(array $data): self;
}
