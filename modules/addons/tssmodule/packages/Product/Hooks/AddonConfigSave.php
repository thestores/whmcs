<?php

use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Packages\Product\Services\ProductConfiguration;
use ModulesGarden\tssmodule\Packages\Product\Helpers\RequiredCustomFieldsGenerator;
use Illuminate\Database\Capsule\Manager as DB;

$hookManager->register(
    function($params) {
        if (!\ModulesGarden\tssmodule\Packages\Product\Helpers\ProductConfiguration::isSupportedInRequest())
        {
            return;
        }

        RequiredCustomFieldsGenerator::addRequiredAddonCustomFields($params['id']);

        if (empty(Request::get('customconfigoption', [])))
        {
            return;
        }

        try
        {
            DB::beginTransaction();

            (new ProductConfiguration($params['id'], ProductConfiguration::PRODUCT_ADDON_TYPE))
                ->flush()
                ->save(Request::get('customconfigoption'));

            DB::commit();

        } catch (\Exception $exception)
        {
            DB::rollback();
        }
    }, 1001);

