<?php
// phpcs:ignoreFile

use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\ClassExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\DirectoryExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\ExtensionExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\FileExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\FunctionExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\IsReadable;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\IsWritable;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\MethodExists;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\PhpMinVersion;
use ModulesGarden\TSSPlugin\Packages\RequirementsChecker\Checkers\WhmcsMinVersion;

return [
    /*new PhpMinVersion('7.2.0'),
    new WhmcsMinVersion('8.9.0'),
    new MethodExists('SimpleXMLElement', 'attributes'),
    new DirectoryExists('/var/www'),
    new FileExists('/var/www/html/index.php'),
    new FunctionExists('exec'),
    new ClassExists('SimpleXMLElement'),
    new ExtensionExists('mysqli'),
    new IsWritable('/var/www'),
    new IsReadable('/var/www')*/
];

