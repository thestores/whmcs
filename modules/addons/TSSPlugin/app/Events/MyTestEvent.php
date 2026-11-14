<?php

namespace ModulesGarden\TSSPlugin\App\Events;

use ModulesGarden\TSSPlugin\Core\Events\Event;

/**
 * Class MyTestEvent
 */
class MyTestEvent extends Event
{
    protected $data = null;

    /**
     * MyTestEvent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }
}
