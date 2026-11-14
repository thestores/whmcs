<?php

namespace ModulesGarden\TSSPlugin\Core\Data;

/**
 * Trait ToArrayTrait
 */
trait ToArrayTrait
{
    /**
     * @return array
     */
    public function toArray()
    {
        $data = [];
        foreach ($this->toArray as $property)
        {
            $data[$property] = $this->{$property};
        }

        return $data;
    }
}
