<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Services;

use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Product;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\TSSPlugin\Packages\Product\Helpers\ProductConfiguration as ProductConfigurationSupport;

class ProductDuplicate
{
    protected int $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    public static function checkAndInitDuplicateProcess()
    {
        if (Request::get('action') == "duplicatenow" && Request::get('existingproduct') && Request::get('newproductname'))
        {
            try
            {
                ModuleSettings::save(["duplicateProduct" => json_encode(Request::request()->all())]);
            }
            catch (\Exception $ex)
            {
            }
        }
    }

    public function replicate(array $settings = [])
    {
        $product = Product::where("id", $this->productId)->where("name", $settings['newproductname'])->first();

        if (!$product->exists || !ProductConfigurationSupport::isSupported($product->servertype))
        {
            return;
        }

        $newConfigs = new ProductConfiguration($this->productId);

        if (!empty($newConfigs->get()))
        {
            return;
        }

        $newConfigs->save((new ProductConfiguration($settings['existingproduct']))->get());
    }
}