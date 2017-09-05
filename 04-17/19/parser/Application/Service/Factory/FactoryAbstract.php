<?php

namespace Application\Service\Factory;

use Application\Service\Olx\OlxService;
use Application\Service\ServiceInterface\ParseInterface;
use Exception;

abstract class FactoryAbstract
{
    /**
     * @param $code
     *
     * @return OlxService
     * @throws Exception
     */
    static public function createService($code)
    {
        $instance = null;
        if ('olx' === $code) {
            $instance = new OlxService();
        }
        if ($instance) {
            if (!($instance instanceof ParseInterface)) {
                throw new Exception('Service should implements ParseInterface');
            }

            return $instance;
        }
        throw new Exception('Undefined service code');
    }
}
