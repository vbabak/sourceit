<?php

namespace Application\Controller;

use Library\Config\ConfigAwareInterface;
use Library\Config\ConfigAwareTrait;
use Library\Log\LogAwareInterface;
use Library\Log\LogAwareTrait;

abstract class ControllerAbstract implements LogAwareInterface, ConfigAwareInterface
{
    use LogAwareTrait;
    use ConfigAwareTrait;

    protected function getViewsDir()
    {
        return APPLICATION_PATH . '/app/Application/views';
    }
}
