<?php

namespace Application\Model;

use Application\Database\MySQLDb;

class Olx
{
    protected $MySQLDb;

    public function __construct($cnf)
    {
        $this->MySQLDb = new MySQLDb($cnf['db']);
    }

    public function addData(array $data)
    {
        $inserted = 0;
        foreach ($data as $v) {
            $title = $v['title'];
            $price = (float) $v['price'];
            $img = $v['img'];
            if (!$this->MySQLDb->itemExists($title, $price, $img)) {
                $this->MySQLDb->addItem($title, $price, $img);
                $inserted++;
            }
        }
        return $inserted;
    }
}