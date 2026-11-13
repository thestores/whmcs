<?php

namespace ModulesGarden\tssmodule\Core\Contracts;

interface ArrayProviderInterface extends RecordsListProviderInterface
{
    public function setData(array $data): self;
}
