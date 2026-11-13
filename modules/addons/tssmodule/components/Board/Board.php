<?php

namespace ModulesGarden\tssmodule\Components\Board;

use ModulesGarden\tssmodule\Components\BoardColumn\BoardColumn;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Components\DataBuilder;
use ModulesGarden\tssmodule\Core\Components\Traits\AjaxDataProviderTrait;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Components\Response\Response;

class Board extends Container
{
    public const COMPONENT = 'Board';

    use AjaxDataProviderTrait;

    public function __construct()
    {
        parent::__construct();

        $this->providerAction = CrudProvider::ACTION_READ;
    }

    protected function processReadAction(string $providerAction)
    {
        return new Response(
            (new DataBuilder($this))
                ->withHtml()
                ->withData()
                ->toArray()
        );
    }

    public function addColumn(BoardColumn $column): self
    {
        $this->addComponent('columns', $column);

        return $this;
    }
}
