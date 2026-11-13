<?php

namespace ModulesGarden\tssmodule\Core\Contracts\Components;

interface ComponentContainerInterface
{
    public function addElement($element): self;
}
