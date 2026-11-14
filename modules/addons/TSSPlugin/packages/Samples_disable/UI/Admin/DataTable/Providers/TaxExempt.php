<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Providers;

use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadParent;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Translator;
use WHMCS\User\Client;

class TaxExempt extends CrudProvider
{
    public function update()
    {
        Client::where('id', $this->formData['id'])->update([
            'taxexempt' => $this->formData['value'] === 'true',
        ]);

        return (new Response())->setSuccess(Translator::get('XXXX', []))->setActions([new ReloadParent()]);
    }
}
