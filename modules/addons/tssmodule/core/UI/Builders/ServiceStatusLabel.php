<?php

namespace ModulesGarden\tssmodule\Core\UI\Builders;

use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Core\Support\Facades\Translator;
use ModulesGarden\tssmodule\Core\UI\Enums\ServiceStatusConfig;

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