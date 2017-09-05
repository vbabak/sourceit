<?php

namespace Application\Controller;

use Application\Service;
use Application\Model;
use Exception;

class IndexController
{
    protected $cnf;

    public function __construct()
    {
        $this->cnf = require APPLICATION_PATH . "/config/settings.php";
    }

    public function parseAction()
    {
        $code = $_GET['provider'] ?? '';

        try {
            $service = Service\Factory\FactoryAbstract::createService($code);
        } catch (Exception $e) {
            $msg = $e->getMessage();
            // log a message
            exit($msg);
        }

        $data = $service->parse();
        $affected = 0;
        if ($service instanceof Service\Olx\OlxService) {
            $olx = new Model\Olx($this->cnf);
            $affected = $olx->addData($data);
        }

        echo 'Added rows: ' . $affected;
    }

    public function indexAction()
    {
        $page = (int) $_GET['p'] ?? 1;
        $page = max($page, 1);
        $items = new Model\Items($this->cnf);
        $data = $items->getItems($page);
        include_once APPLICATION_PATH . '/view/index.phtml';
    }
}
