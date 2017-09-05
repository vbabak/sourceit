<?php

namespace Application\Model;

use Library\Db\Db;
use PDO;

class User extends DbModelAbstract
{
    protected $user_id;
    protected $username;
    protected $email;
    protected $password;
    protected $created;

    public static function findById(int $id)
    {
        $pdo = Db::getInstance();
        $sth = $pdo->prepare('SELECT * FROM `users` WHERE `user_id` = :user_id LIMIT 1');
        $sth->execute(['user_id' => (int) $id]);
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (empty($data)) {
            return null;
        }
        $user = new static();
        $user->setData(array_shift($data));
        return $user;
    }
}
