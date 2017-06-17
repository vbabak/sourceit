<?php

namespace Application\Database;

use MySQLi;

class MySQLDb
{
    protected static $conn;

    public function __construct($cnf)
    {
        if (!self::$conn) {
            self::$conn = new MySQLi($cnf['host'], $cnf['user'], $cnf['pwd'], $cnf['db_name']);
            self::$conn->set_charset("utf8");
        }
    }

    public function itemExists($title, $price, $img)
    {
        $stmt = self::$conn->prepare('SELECT `item_id` FROM `items` WHERE `title` = ? AND `price` = ? AND `img_path` = ? LIMIT 1');
        $stmt->bind_param('sds', $title, $price, $img);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return (bool) $data;
    }

    public function addItem($title, $price, $img)
    {
        $stmt = self::$conn->prepare('INSERT INTO `items` SET `title` = ?, `price` = ?, `img_path` = ?');
        $stmt->bind_param('sds', $title, $price, $img);
        $stmt->execute();
        return self::$conn->insert_id;
    }

    public function getItemsTotalCount()
    {
        $stmt = self::$conn->prepare('SELECT count(*) as cnt FROM `items`');
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        return (int) $data['cnt'];
    }

    public function getItems(int $start, int $limit)
    {
        $stmt = self::$conn->prepare('SELECT * FROM `items` LIMIT ?, ?');
        $stmt->bind_param('dd', $start, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
