<?php

namespace ModulesGarden\tssmodule\Core\Components\Traits;

/**
 * Trait ElementsTrait
 */
trait SizeTrait
{
    public function setsize(string $size): self
    {
        $this->setSlot('size', $size);

        return $this;
    }
}
