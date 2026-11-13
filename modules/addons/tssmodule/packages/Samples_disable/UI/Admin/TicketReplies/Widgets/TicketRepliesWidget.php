<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TicketReplies\Widgets;

use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Ticket;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserEdit;
use ModulesGarden\tssmodule\Components\TicketReplyPreview\TicketReplyPreview;

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