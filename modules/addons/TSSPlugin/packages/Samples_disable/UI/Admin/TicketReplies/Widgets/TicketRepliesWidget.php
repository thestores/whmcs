<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TicketReplies\Widgets;

use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Ticket;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Buttons\UserEdit;
use ModulesGarden\TSSPlugin\Components\TicketReplyPreview\TicketReplyPreview;

class TicketRepliesWidget extends Widget implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $ticket = Ticket::find(2);

        foreach ($ticket->replies as $ticketReply)
        {
            $ticketReplyPreview = new TicketReplyPreview($ticketReply);
            $ticketReplyPreview->onChange(new Reload($this));
            $ticketReplyPreview->addEditButton(new UserEdit());
            $ticketReplyPreview->addEditButton(new UserDelete());
            $this->addElement($ticketReplyPreview);
        }
    }
}