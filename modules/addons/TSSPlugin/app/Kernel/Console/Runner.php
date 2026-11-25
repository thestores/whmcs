<?php

namespace TSSPlugin\App\Kernel\Console;

use TSSPlugin\App\Kernel\Kernel;

/**
 * Runs a cron job of the module from the command line (cron/cron.php):
 *
 *   php cron/cron.php RunAll
 *   php cron/cron.php SSLCertificates --force
 *   php cron/cron.php list
 *
 * Every class in app/Cron that extends Command is a job, known by its $name.
 */
class Runner extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        parent::__construct(Kernel::module());

        foreach(glob(Kernel::path('app', 'Cron', '*.php')) ?: [] as $file)
        {
            $class = 'TSSPlugin\\App\\Cron\\' . basename($file, '.php');
            if(class_exists($class) && is_subclass_of($class, Command::class) && !(new \ReflectionClass($class))->isAbstract())
            {
                $this->add(new $class());
            }
        }
    }
}
