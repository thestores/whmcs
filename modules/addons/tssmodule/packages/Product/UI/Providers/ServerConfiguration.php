<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Providers;

use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\Redirect;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\Translation\TranslatorTrait;

class ServerConfiguration extends CrudProvider
{
    use TranslatorTrait;

    public function read()
    {
        $data = (new \ModulesGarden\tssmodule\Packages\Product\Services\ServerConfiguration(Request::get('id', 0)))
            ->get();

        foreach ($data as $setting => $value)
        {
            $this->data[sprintf('serverconfig[%s]', $setting)] = $value;

            if (is_array($value))
            {
                foreach ($value as $key => $subValue)
                {
                    $this->data[sprintf("serverconfig[%s][{$key}]", $setting)] = $subValue;
                }
            }
        }
    }

    public function create()
    {
        (new \ModulesGarden\tssmodule\Packages\Product\Services\ServerConfiguration(Request::get('id', 0)))
            ->save($this->formData['serverconfig']);

        return (new Response())
            ->setSuccess($this->translate("create_success"))
            ->setActions([
                new ModalClose(),
                new Redirect(html_entity_decode(Request::getRequestUri()))
            ]);
    }
}
