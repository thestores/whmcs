<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms;


use ModulesGarden\TSSPlugin\App\Libs\Icons;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Shared\CronStatus;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Concerns\SettingsLayout;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Providers\CronSettingsProvider;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\FormSubmit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

/**
 * One block per cron job - what it does, when it ran last and, right below, how often it runs - in one form with one
 * Save button.
 */
class CronConfigurationForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    use SettingsLayout;

    /** job => [setting key of its frequency (null: runs with every start), choices] */
    const JOBS = [
        'ProductPricingUpdate'      => ['cron1', ['1d', '1w', '1mo', 'never']],
        'SSLCertificatesProcessing' => ['cron5', ['5m', '10m', '30m', '1h', '3h', 'never']],
        'SSLCertificates'           => ['cron2', ['1d', '12h', '1w', 'never']],
        'RenewalNotifyCertificate'  => ['cron3', ['1d', 'never']],
        'SSLAutoInstall'            => [null, []],
    ];

    const LABELS = [
        '5m' => 'every 5 minutes', '10m' => 'every 10 minutes', '30m' => 'every 30 minutes', '1h' => 'every hour', '3h' => 'every 3 hours',
        '12h' => 'every 12 hours', '1d' => 'every day', '1w' => 'every week', '1mo' => 'every month', 'never' => 'never',
    ];

    protected $configuration;

    public function __construct($configuration = false)
    {
        parent::__construct();

        $this->configuration  = $configuration;
        $this->provider       = CronSettingsProvider::class;
        $this->providerAction = CronSettingsProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('CronConfigurationForm');

        $status = CronStatus::rows();
        $script = dirname(__DIR__, 6) . '/cron/cron.php';

        foreach(self::JOBS as $job => [$key, $choices])
        {
            $block = new Widget();
            $block->setCss('tss-cronjob');
            $this->addElement($block);

            $row     = isset($status[$job]) ? $status[$job] : ['last' => null, 'error' => ''];
            $failing = $row['error'] !== '';
            $badge   = $row['last'] === null
                ? '<span class="tss-badge tss-badge--idle">' . Icons::svg('clock-outline') . '' . $this->translate('neverRunBadge') . '</span>'
                : ($failing
                    ? '<span class="tss-badge tss-badge--bad">' . Icons::svg('alert-outline') . '' . $this->translate('failing') . '</span>'
                    : '<span class="tss-badge tss-badge--ok">' . Icons::svg('check-circle-outline') . '' . $this->translate('healthy') . '</span>');
            $last    = $row['last'] === null ? $this->translate('neverRun') : htmlspecialchars($row['last']);

            $block->addElement((new Text())->setText(
                '<div class="tss-cronjob__head"><h3>' . $this->translate('name_' . $job) . '</h3>' . $badge . '</div>'
                . '<p class="tss-cronjob__about">' . $this->translate('about_' . $job) . '</p>'
                . ($failing ? '<div class="tss-cronjob__fail">' . $this->translate('lastRun') . ' ' . $last . ' &mdash; ' . htmlspecialchars($row['error']) . '</div>' : '')
                . '<hr class="tss-cronjob__sep">'
            ));

            $block->addElement((new Text())->setText(
                '<div class="tss-cronjob__freq">' . Icons::svg('clock-outline') . '<span>' . $this->translate('howOften') . '</span>'
                . ($key === null ? '<span class="tss-cronjob__fixed">' . $this->translate('everyStart') . '</span>' : '') . '</div>'
            ));

            if($key !== null)
            {
                $options = [];
                foreach($choices as $choice)
                {
                    $options[$choice] = self::LABELS[$choice];
                }
                $field = new Dropdown();
                $field->required();
                $field->setDefaultValueAsFirstOption();
                $field->setName($key);
                $field->setOptions($options);
                $this->builder->addFieldInContainer($block, $field);
            }

            $block->addElement((new Text())->setText(
                '<p class="tss-cronjob__meta"><span>' . Icons::svg('clock-outline') . '' . $this->translate('lastRun') . ' ' . $last . '</span>'
                . '<span>' . Icons::svg('console') . '' . $this->translate('runNow') . ' <code>php -q &hellip;/cron/cron.php ' . $job . ' --force</code></span></p>'
            ));
        }

        $this->saveBar();
    }
}
