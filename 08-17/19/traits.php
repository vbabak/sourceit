<?php

trait Destroy
{
    protected function create()
    {
        var_dump(__METHOD__); // Destroy::create
        // var_dump(__CLASS__); // Creatable
    }
}

trait Db
{
    private function create()
    {
        var_dump(__METHOD__);
    }
}

trait Logger
{
    protected function create()
    {
        var_dump(__METHOD__);
    }
}


class Creatable
{
    use Destroy, Db, Logger {
        Db::create insteadof Destroy, Logger;
        // Db::create insteadof Destroy;
        // Db::create insteadof Logger;
        Logger::create as logger_create;
        // Destroy::create as protected create2;
        // Destroy::create as public create2;
    }

    public function recreate()
    {
        $this->create();
        $this->logger_create();
        // $this->create2();
    }
}

$c = new Creatable();
$c->recreate();
// $c->create2();