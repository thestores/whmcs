<?php

namespace ModulesGarden\TSSPlugin\Core\UI;

use Exception;
use ModulesGarden\TSSPlugin\Core\Components\DataBuilder;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentInterface;
use ModulesGarden\TSSPlugin\Core\DependencyInjection;
use ModulesGarden\TSSPlugin\Core\UI\Helpers\TemplateConstants;
use function ModulesGarden\TSSPlugin\Core\Helper\isAdmin;

abstract class AbstractPartialView
{
    protected array $elements = [];

    /**
     * @param $element
     * @return $this
     * @throws Exception
     * @todo - refactor me
     */
    public function addElement($element): self
    {
        if (is_string($element))
        {
            $element = DependencyInjection::create($element);
        }

        if (!$element instanceof ComponentInterface)
        {
            throw new Exception('Class ' . get_class($element) . ' must implements ' . ComponentInterface::class);
        }

        $this->elements[] = $element;

        return $this;
    }


    public function getElements()
    {
        return $this->elements;
    }

    protected function buildRootElements(array $rootElements)
    {
        return array_map(function($element) {
            return (new DataBuilder($element))
                ->withHtml()
                ->toArray();
        }, $rootElements);
    }
}