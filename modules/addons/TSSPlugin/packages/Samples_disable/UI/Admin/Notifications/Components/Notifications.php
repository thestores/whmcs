<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Notifications\Components;

use ModulesGarden\TSSPlugin\Components\Link\Link;
use ModulesGarden\TSSPlugin\Components\NotificationDropdown\NotificationDropdown;
use ModulesGarden\TSSPlugin\Components\NotificationDropdownItem\NotificationDropdownItem;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Redirect;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\UI\Formatters\RelatedItemLink;
use ModulesGarden\TSSPlugin\Packages\Notifier\Models\Notification;
use ModulesGarden\TSSPlugin\Packages\Notifier\Recipient\Administrator;
use ModulesGarden\TSSPlugin\Packages\Notifier\Support\Facades\Notifier;

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