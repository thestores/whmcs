<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts\Components;

interface ComponentContainerInterface
{
    public function addElement($element): self;
}
