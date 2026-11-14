<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Actions;

use ModulesGarden\TSSPlugin\Core\Components\AbstractActionInterface;

class RedirectToPreviousPage extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'redirectToPreviousPage',
        ];
    }
}
