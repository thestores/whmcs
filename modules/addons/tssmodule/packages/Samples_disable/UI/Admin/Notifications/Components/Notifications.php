<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Notifications\Components;

use ModulesGarden\tssmodule\Components\Link\Link;
use ModulesGarden\tssmodule\Components\NotificationDropdown\NotificationDropdown;
use ModulesGarden\tssmodule\Components\NotificationDropdownItem\NotificationDropdownItem;
use ModulesGarden\tssmodule\Core\Components\Actions\Redirect;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItemLink;
use ModulesGarden\tssmodule\Packages\Notifier\Models\Notification;
use ModulesGarden\tssmodule\Packages\Notifier\Recipient\Administrator;
use ModulesGarden\tssmodule\Packages\Notifier\Support\Facades\Notifier;

class Notifications extends NotificationDropdown implements AjaxComponentInterface, AdminAreaInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->enableAutoReload();
    }

    protected function loadItems()
    {
        $notifications = Notifier::get(new Administrator(1));

        foreach ($notifications as $notification) {
            $item = new NotificationDropdownItem();

            $item->setTitle($notification->getSubject());
            $item->setDescription($notification->getMessage());
            $item->setDate($notification->getDate());
            $item->setReadFlag($notification->getRead());
            $item->setItemId($notification->getId());

            $this->addItem($item);
        }
    }

    protected function clickItemCallback($itemId)
    {
        $notification = Notification::where('id', $itemId)->first();

        //Mark as read
        if ($notification->exists && !$notification->read)
        {
            $notification->read = 1;
            $notification->save();
        }

        //Redirect ro related item
        $link = (new RelatedItemLink())->format($notification->rel_type, $notification->rel_id);
        $url = $link instanceof Link ? $link->getSlot('url') : "";
        return new Redirect($url);
    }

    protected function deleteItemCallback($itemId)
    {
        Notification::where('id', $itemId)->delete();
        return new Reload($this);
    }
}