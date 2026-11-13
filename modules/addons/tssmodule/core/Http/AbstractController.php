<?php

namespace ModulesGarden\tssmodule\Core\Http;

use ModulesGarden\tssmodule\Core\Traits\IsAdmin;
use ModulesGarden\tssmodule\Core\Traits\OutputBuffer;

/**
 * Description of AbstractController
 */
class AbstractController
{
    use IsAdmin;
    use OutputBuffer;
}
