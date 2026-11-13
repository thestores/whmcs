<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Providers;

use ModulesGarden\tssmodule\Core\Components\Actions\ReloadParent;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Translator;
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
