<?php

namespace ModulesGarden\tssmodule\Components\DatePicker\Enums;

enum Type: string
{
    case Date       = 'date';
    case DateTime   = 'datetime';
    case Time       = 'time';
    case Year       = 'year';
    case Month      = 'month';
    case Week       = 'week';
}