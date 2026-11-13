<?php

namespace ModulesGarden\tssmodule\Components\HtmlEditor;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;

class HtmlEditor extends FormField
{
    public const COMPONENT = 'HtmlEditor';

    public function enableAutoSave(bool $autoSave = true):self
    {
        $this->setSlot('autoSaveEnabled', $autoSave);

        return $this;
    }

    public function enableEmoticons(bool $emoticons = true):self
    {
        $this->setSlot('emoticonsEnabled', $emoticons);

        return $this;
    }
}