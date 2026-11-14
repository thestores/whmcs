<?php

//boostrap
use ModulesGarden\TSSPlugin\Core\DependencyInjection\PackageServices;
use ModulesGarden\TSSPlugin\Core\DependencyInjection\Services;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'functions.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'Helper' . DIRECTORY_SEPARATOR . 'Functions.php';

/**
 * Initialize base values
 */
ModuleConstants::initialize();

/**
 * Initialize Services
 */
new Services();

/**
 * Boot packages
 */
\ModulesGarden\TSSPlugin\Core\make(PackageServices::class);