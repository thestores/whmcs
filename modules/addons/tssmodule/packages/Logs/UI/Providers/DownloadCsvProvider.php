<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Providers;

use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Http\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DownloadCsvProvider extends CrudProvider
{
    public const LOGS_EXPORTED_FILE_NAME = 'logs.csv';

    public function read()
    {
        $fileFullName = $this->formData->get('fileFullName');

        if (empty($fileFullName))
        {
            throw new \Exception("File Not Found");
        }

        return (new BinaryFileResponse(new \SplFileInfo($fileFullName)))
            ->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, self::LOGS_EXPORTED_FILE_NAME)
            ->deleteFileAfterSend(true);
    }
}