<?php

use ModulesGarden\Servers\tssmodule\app\controllers\server\admin\Actions;
use ModulesGarden\Servers\tssmodule\Server;

if(!defined('DS'))define('DS',DIRECTORY_SEPARATOR);

require_once __DIR__.DS.'Loader.php';
new \ModulesGarden\Servers\tssmodule\Loader();

// Edition name (GoGetSSL Module / TheSSLStore Plugin) - loaded directly, without booting the addon framework
if(file_exists(dirname(__DIR__, 2).DS.'addons'.DS.'tssmodule'.DS.'app'.DS.'Libs'.DS.'Edition.php'))
{
    require_once dirname(__DIR__, 2).DS.'addons'.DS.'tssmodule'.DS.'app'.DS.'Libs'.DS.'Edition.php';
}

\ModulesGarden\Servers\tssmodule\Server::I();



if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function tssmodule_MetaData() {
    return array(
        'DisplayName' => class_exists('\ModulesGarden\tssmodule\App\Libs\Edition', false) ? \ModulesGarden\tssmodule\App\Libs\Edition::name() : 'GoGetSSL Module',
        'APIVersion' => '1.0',
    );
}

function tssmodule_ConfigOptions() {
    return (new Actions())->ConfigOptions();
}

function tssmodule_CreateAccount($params) {
    return (new Actions())->CreateAccount($params);
}

function tssmodule_SuspendAccount($params) {
    return (new Actions())->SuspendAccount($params);
}

function tssmodule_UnsuspendAccount($params) {
    return (new Actions())->UnsuspendAccount($params);
}

function tssmodule_ChangePackage($params) {
    return (new Actions())->ChangePackage($params);
}

function tssmodule_SSLStepOne($params) {
    return (new Actions())->SSLStepOne($params);
}

function tssmodule_SSLStepTwo($params) {
    return (new Actions())->SSLStepTwo($params);
}

function tssmodule_SSLStepThree($params) {
    return (new Actions())->SSLStepThree($params);
}

function tssmodule_TerminateAccount($params) {
    return (new Actions())->TerminateAccount($params);
}

function tssmodule_AdminCustomButtonArray($params = []) {
    return (new Actions())->AdminCustomButtonArray($params);
}

function tssmodule_RecheckValidation($params) {
    return (new Actions())->RecheckValidation($params);
}

function tssmodule_CancelOrder($params) {
    return (new Actions())->CancelOrder($params);
}

function tssmodule_DownloadAuthFile($params) {
    return (new Actions())->DownloadAuthFile($params);
}

function tssmodule_ClientAreaCustomButtonArray($params = []) {
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function tssmodule_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function tssmodule_ClientAreaCustomDownloadCertificate($params) {
    return (new Actions())->DownloadCertificate($params);
}

function tssmodule_SyncCertificate($params) {
    return (new Actions())->SyncCertificate($params);
}

function tssmodule_SSLAdminResendApproverEmail($params) {
    return (new Actions())->ResendApproverEmail($params);
}

function tssmodule_SSLAdminResendCertificate($params) {
    return (new Actions())->ResendCertificate($params);
}

function tssmodule_Renew($params) {
    return (new Actions())->Renew($params);
}

function tssmodule_AdminServicesTabFields(array $params) {
    return (new Actions())->AdminServicesTabFields($params);
}

function tssmodule_AdminServicesTabFieldsSave(array $params) {
    (new \ModulesGarden\Servers\tssmodule\app\services\AdminServicesTabFields())->save($params);
}

function tssmodule_SSLAdminGetCertificate($params) {
    return (new Actions())->GetCertificate($params);
}

function tssmodule_ClientAreaCustomReissueCertificate($params) {
    return (new Actions())->ReissueCertificate($params);
}

function tssmodule_ClientAreaCustomContactDetails($params) {
    return (new Actions())->ContactDetails($params);
}

function tssmodule_ClientArea(array $params) {
    
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
