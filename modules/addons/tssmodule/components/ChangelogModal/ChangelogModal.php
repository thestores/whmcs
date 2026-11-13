<?php

namespace ModulesGarden\tssmodule\Components\ChangelogModal;

use ModulesGarden\tssmodule\Components\Modal\ModalInfo;
use ModulesGarden\tssmodule\Core\Components\Traits\TranslatorTrait;

class ChangelogModal extends ModalInfo
{
    use TranslatorTrait;

    public const COMPONENT = "ChangelogModal";
    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'seeChangelog',
            'released'
        ]);
    }

    public function addVersion($element): self
    {
        $this->pushToSlot('versions', $element);
        return $this;
    }

    public function setChangelogUrl($url): self
    {
        $this->setSlot('changelogUrl', $url);
        return $this;
    }
}
