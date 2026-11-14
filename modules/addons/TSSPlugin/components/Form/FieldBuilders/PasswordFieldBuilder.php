<?php

namespace ModulesGarden\TSSPlugin\Components\Form\FieldBuilders;

use ModulesGarden\TSSPlugin\Components\CopyToClipboardButton\CopyToClipboardButton;
use ModulesGarden\TSSPlugin\Components\FormPasswordGenerator\FormPasswordGenerator;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class PasswordFieldBuilder
{
    protected string $minLengthSettingName = 'passwordStrength';
    protected string $randomCharactersSettingName = 'passwordRandomChars';

    public function create($fieldName = "password"): FormPasswordGenerator
    {
        $passwordField = (new FormPasswordGenerator())->setName($fieldName);
        $copyToClipboard = new CopyToClipboardButton();
        $copyToClipboard->copyFromUsingName($passwordField->getName());
        $passwordField->addElement($copyToClipboard);

        if ($passwordLength = ModuleSettings::get($this->minLengthSettingName )) {
            $passwordField->greaterThen($passwordLength);
        }

        if ($allowedPasswordCharacters = ModuleSettings::get($this->randomCharactersSettingName)) {
            $passwordField->setAlphabet($allowedPasswordCharacters);
        }

        return $passwordField->required();
    }

    public function setMinLengthSettingName(string $minLengthSettingName)
    {
        $this->minLengthSettingName = $minLengthSettingName;

        return $this;
    }

    public function setRandomCharactersSettingName(string $randomCharactersSettingName)
    {
        $this->randomCharactersSettingName = $randomCharactersSettingName;

        return $this;
    }
}