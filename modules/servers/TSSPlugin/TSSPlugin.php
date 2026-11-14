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

/** A certificate kept as a record of the legacy module (App\Libs\RecordOnly): the answer for it, null for any other */
function TSSPlugin_recordOnlyGuard($function, $params) {
    try {
        return class_exists('\ModulesGarden\TSSPlugin\App\Libs\RecordOnly') ? \ModulesGarden\TSSPlugin\App\Libs\RecordOnly::guard($function, $params) : null;
    } catch(\Throwable $e) {
        return null;
    }
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
    if(($recordOnly = TSSPlugin_recordOnlyGuard('CreateAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->CreateAccount($params);
}

function TSSPlugin_SuspendAccount($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SuspendAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->SuspendAccount($params);
}

function TSSPlugin_UnsuspendAccount($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('UnsuspendAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->UnsuspendAccount($params);
}

function TSSPlugin_ChangePackage($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ChangePackage', $params)) !== null) return $recordOnly;
    return (new Actions())->ChangePackage($params);
}

function TSSPlugin_SSLStepOne($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLStepOne', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepOne($params);
}

function TSSPlugin_SSLStepTwo($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLStepTwo', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepTwo($params);
}

function TSSPlugin_SSLStepThree($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLStepThree', $params)) !== null) return $recordOnly;
    return (new Actions())->SSLStepThree($params);
}

function TSSPlugin_TerminateAccount($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('TerminateAccount', $params)) !== null) return $recordOnly;
    return (new Actions())->TerminateAccount($params);
}

function TSSPlugin_AdminCustomButtonArray($params = []) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('AdminCustomButtonArray', $params)) !== null) return $recordOnly;
    return (new Actions())->AdminCustomButtonArray($params);
}

function TSSPlugin_RecheckValidation($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('RecheckValidation', $params)) !== null) return $recordOnly;
    return (new Actions())->RecheckValidation($params);
}

function TSSPlugin_CancelOrder($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('CancelOrder', $params)) !== null) return $recordOnly;
    return (new Actions())->CancelOrder($params);
}

function TSSPlugin_DownloadAuthFile($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('DownloadAuthFile', $params)) !== null) return $recordOnly;
    return (new Actions())->DownloadAuthFile($params);
}

function TSSPlugin_ClientAreaCustomButtonArray($params = []) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ClientAreaCustomButtonArray', $params)) !== null) return $recordOnly;
    return (new Actions())->ClientAreaCustomButtonArray($params);
}

function TSSPlugin_ClientAreaAllowedFunctions() {
    return (new Actions())->ClientAreaAllowedFunctions();
}

function TSSPlugin_ClientAreaCustomDownloadCertificate($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ClientAreaCustomDownloadCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->DownloadCertificate($params);
}

function TSSPlugin_SyncCertificate($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SyncCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->SyncCertificate($params);
}

function TSSPlugin_SSLAdminResendApproverEmail($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLAdminResendApproverEmail', $params)) !== null) return $recordOnly;
    return (new Actions())->ResendApproverEmail($params);
}

function TSSPlugin_SSLAdminResendCertificate($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLAdminResendCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->ResendCertificate($params);
}

function TSSPlugin_Renew($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('Renew', $params)) !== null) return $recordOnly;
    return (new Actions())->Renew($params);
}

function TSSPlugin_AdminServicesTabFields(array $params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('AdminServicesTabFields', $params)) !== null) return $recordOnly;
    return (new Actions())->AdminServicesTabFields($params);
}

function TSSPlugin_AdminServicesTabFieldsSave(array $params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('AdminServicesTabFieldsSave', $params)) !== null) return $recordOnly;
    (new \ModulesGarden\Servers\TSSPlugin\app\services\AdminServicesTabFields())->save($params);
}

function TSSPlugin_SSLAdminGetCertificate($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('SSLAdminGetCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->GetCertificate($params);
}

function TSSPlugin_ClientAreaCustomReissueCertificate($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ClientAreaCustomReissueCertificate', $params)) !== null) return $recordOnly;
    return (new Actions())->ReissueCertificate($params);
}

function TSSPlugin_ClientAreaCustomContactDetails($params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ClientAreaCustomContactDetails', $params)) !== null) return $recordOnly;
    return (new Actions())->ContactDetails($params);
}

function TSSPlugin_ClientArea(array $params) {
    if(($recordOnly = TSSPlugin_recordOnlyGuard('ClientArea', $params)) !== null) return $recordOnly;
    
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
