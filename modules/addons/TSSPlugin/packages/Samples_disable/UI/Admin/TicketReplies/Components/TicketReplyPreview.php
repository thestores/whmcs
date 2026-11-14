<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TicketReplies\Components;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Components\TicketReplyPreview\TicketReplyPreview as TicketReplyPreviewComponent;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class TicketReplyPreview extends TicketReplyPreviewComponent implements AdminAreaInterface, AjaxComponentInterface
{

}