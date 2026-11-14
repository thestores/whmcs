<?php

use ModulesGarden\Servers\TSSPlugin\app\controllers\server\admin\Actions;
use ModulesGarden\Servers\TSSPlugin\Server;

if(!defined('DS'))define('DS',DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'Loader.php';
new \ModulesGarden\Servers\TSSPlugin\Loader();

// Edition name (GoGetSSL Module / TheSSLStore Plugin) - loaded directly, without booting the addon framework
if(file_exists(dirname(__DIR__, 2).DS.'addons'.DS.'TSSPlugin'.DS.'app'.DS.'Libs'.DS.'Edition.php'))
{
    require_once dirname(__DIR__, 2).DS.'addons'.DS.'TSSPlugin'.DS.'app'.DS.'Libs'.DS.'Edition.php';
}

\ModulesGarden\Servers\TSSPlugin\Server::I();



if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function TSSPlugin_MetaData() {
    return array(
        'DisplayName' => class_exists('\ModulesGarden\TSSPlugin\App\Libs\Edition', false) ? \ModulesGarden\TSSPlugin\App\Libs\Edition::name() : 'GoGetSSL Module',
        'APIVersion' => '1.0',
    );
}

function TSSPlugin_ConfigOptions() {
    return (new Actions())->ConfigOptions();
}

function TSSPlugin_CreateAccount($params) {
    return (new Actions())->CreateAccount($params);
}

function TSSPlugin_SuspendAccount($params) {
    return (new Actions())->SuspendAccount($params);
}

function TSSPlugin_UnsuspendAccount($params) {
    return (new Actions())->UnsuspendAccount($params);
}

function TSSPlugin_ChangePackage($params) {
    return (new Actions())->ChangePackage($params);
}

function TSSPlugin_SSLStepOne($params) {
    return (new Actions())->SSLStepOne($params);
}

function TSSPlugin_SSLStepTwo($params) {
    return (new Actions())->SSLStepTwo($params);
}

function TSSPlugin_SSLStepThree($params) {
    return (new Actions())->SSLStepThree($params);
}

function TSSPlugin_TerminateAccount($params) {
    return (new Actions())->TerminateAccount($params);
}

function TSSPlugin_AdminCustomButtonArray($params = []) {
    return (new Actions())->AdminCustomButtonArray($params);
}

function TSSPlugin_RecheckValidation($params) {
    return (new Actions())->RecheckValidation($params);
}

function TSSPlugin_CancelOrder($params) {
    return (new Actions())->CancelOrder($params);
}

function TSSPlugin_DownloadAuthFile($params) {
    return (new Actions())->DownloadAuthFile($params);
}

function TSSPlugin_ClientAreaCustomButtonArray($params = []) {
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function TSSPlugin_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function TSSPlugin_ClientAreaCustomDownloadCertificate($params) {
    return (new Actions())->DownloadCertificate($params);
}

function TSSPlugin_SyncCertificate($params) {
    return (new Actions())->SyncCertificate($params);
}

function TSSPlugin_SSLAdminResendApproverEmail($params) {
    return (new Actions())->ResendApproverEmail($params);
}

function TSSPlugin_SSLAdminResendCertificate($params) {
    return (new Actions())->ResendCertificate($params);
}

function TSSPlugin_Renew($params) {
    return (new Actions())->Renew($params);
}

function TSSPlugin_AdminServicesTabFields(array $params) {
    return (new Actions())->AdminServicesTabFields($params);
}

function TSSPlugin_AdminServicesTabFieldsSave(array $params) {
    (new \ModulesGarden\Servers\TSSPlugin\app\services\AdminServicesTabFields())->save($params);
}

function TSSPlugin_SSLAdminGetCertificate($params) {
    return (new Actions())->GetCertificate($params);
}

function TSSPlugin_ClientAreaCustomReissueCertificate($params) {
    return (new Actions())->ReissueCertificate($params);
}

function TSSPlugin_ClientAreaCustomContactDetails($params) {
    return (new Actions())->ContactDetails($params);
}

function TSSPlugin_ClientArea(array $params) {
    
    if(!empty($_REQUEST['json']))
    {
        // Response is always a json_encode()d string (see Server::getJSONClientAreaPage), never HTML
        header('Content-Type: application/json; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        $jsonResponse = Server::getJSONClientAreaPage($params, $_REQUEST);
        echo $jsonResponse;
        die();
    }

    return Server::getHTMLClientAreaPage($params, $_REQUEST);
}
