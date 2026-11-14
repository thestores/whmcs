<?php

namespace ModulesGarden\TSSPlugin\Core\UI\Builders;

use ModulesGarden\TSSPlugin\Components\Label\Label;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Translator;
use ModulesGarden\TSSPlugin\Core\UI\Enums\ServiceStatusConfig;

class ServiceStatusLabel
{
    public static function create(string $type): Label
    {
        $config = ServiceStatusConfig::byStatus($type);

        $label = new Label();
        $label->setText(Translator::get("service.status.{$type}"));
        $label->displayAsStatusLabel();
        $label->setType($config['type']);

        return $label;
    }

}