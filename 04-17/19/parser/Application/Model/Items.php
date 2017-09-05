<?php

namespace Application\Model;

use Application\Database\MySQLDb;

class Items
{
    protected $MySQLDb;

    public function __construct($cnf)
    {
        $this->MySQLDb = new MySQLDb($cnf['db']);
    }

    public function getItems(int $start)
    {
        $total = $this->MySQLDb->getItemsTotalCount();
        $pagination = new Pagination($total, 10, $start, 7);
        $data = $this->MySQLDb->getItems($pagination->getStart(), $pagination->getLimit());
        return [
            'data' => $data,
            'pagination' => $pagination
        ];
    }
}