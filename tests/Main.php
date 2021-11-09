<?php

declare(strict_types=1);

namespace Imi\Laravel\Database\Test;

use Imi\Main\AppBaseMain;
use Yurun\Doctrine\Common\Annotations\AnnotationReader;

class Main extends AppBaseMain
{
    public function __init(): void
    {
        AnnotationReader::addGlobalIgnoredName('depends');
    }
}
