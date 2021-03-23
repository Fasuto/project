<?php


namespace App\Models;


class User
{
    public int $id;
    public string $name;

    public function toArray(){
        return get_object_vars($this);
    }
}