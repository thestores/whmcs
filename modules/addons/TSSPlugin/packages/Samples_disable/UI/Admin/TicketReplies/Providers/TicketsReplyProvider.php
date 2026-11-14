<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TicketReplies\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

class TicketsReplyProvider extends CrudProvider
{
    public function read()
    {
        $masterOptions = [
            '1' => "Opcja 1",
            '2' => "Opcja 2",
            '3' => "Opcja 3",
        ];

        $this->availableValues->set('masterDropdown',  $masterOptions);
    }

}