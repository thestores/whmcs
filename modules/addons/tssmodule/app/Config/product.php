<?php
// phpcs:ignoreFile

use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\WHMCS\URL;
use ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\AbstractConfigurableOption;

return [
    'sidebars'                  => [
        'someTestSidebar' => [
            'productDetails'      => [
                'order' => 1,
                'uri'   => function() {
                    return URL\Client::productDetails(Request::get('id', 0));
                }
            ],
            'productDetailsModop' => [
                'order' => 2,
                'uri'   => function() {
                    return URL\Client::productDetails(Request::get('id', 0), ['modop' => 'custom']);
                }
            ],
            'tickets'             => [
                'order' => 3,
                'uri'   => 'supporttickets.php'
            ],
            'backup'              => [
                'order' => 4,
                'uri'   => function() {
                    return URL\Client::productDetails(Request::get('id', 0), [
                        'modop'   => 'custom',
                        'a'       => 'management',
                        'mg-page' => 'backup',
                    ]);
                }
            ],
        ]
    ],
    'CustomFields'              => [
        new \ModulesGarden\tssmodule\Packages\Product\Libs\CustomFields\TextBox('text', 'Text'),
    ],
    'ConfigurableOptions'       => [
        (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Dropdown('drop1', 'dropdown1'))
            ->setOptions([
                new ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption('jeden', 'Jeden'),
                new ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption('dwa', 'Dwa')
            ]),
        (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Dropdown('drop2', 'dropdown2'))
            ->setOptionsLoader(function(AbstractConfigurableOption $configurableOption, \ModulesGarden\tssmodule\Core\WHMCS\Models\Product $product) {
                $configurableOption->setOptions([
                    new ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption('jeden', 'Trzy'),
                    new ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption('dwa', 'Cztery')
                ]);
            }),
        (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Radio('radio', 'Radio')),
        (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\CheckBox('checkbox', 'Checkbox')),
        (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Quantity('quantity', 'Quantity'))
            ->setRange(0, 100),
    ],
    'ConfigurableOptionsLoader' => function(int $productId) {
        //You should run your custom class here and return similar array
        return [
            (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Radio('radio', 'Radio')),
            (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\CheckBox('checkbox', 'Checkbox')),
            (new \ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Quantity('quantity', 'Quantity'))
                ->setRange(0, 100),
        ];
    }
];