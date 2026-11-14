<?php

namespace ModulesGarden\TSSPlugin\Core\Http;

use ModulesGarden\TSSPlugin\Core\Traits\IsAdmin;
use ModulesGarden\TSSPlugin\Core\Traits\OutputBuffer;

/**
 * Description of AbstractController
 */
class AbstractController
{
    use IsAdmin;
    use OutputBuffer;
}
