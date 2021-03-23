<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Drivers\MysqlDriver;
use PDO;
use App\Models\User;

class UserRepository
{

    use MysqlDriver;

    public function getAll(){
        $statement = 'select * from users;';
        $this->connect();
        $query = $this->conn->prepare($statement);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public static function toArray(array $records){
        $users = [];
        foreach ($records as $record){ $users[] = $record->toArray(); }
        return $users;
    }

}









