<?php

namespace ModulesGarden\TSSPlugin\Core\Exporters\DataModels;

use ModulesGarden\TSSPlugin\Core\Exporters\Source\BaseDataModel;
use Stringable;

class StringData extends BaseDataModel implements Stringable
{
    protected string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString(): string
    {
        return $this->content;
    }
}