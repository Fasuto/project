<?php


namespace Test\Feature;

use App\Models\User;
use Test\BaseTest;

class UserTest extends BaseTest
{
    public function testPublicSayHello(){
        $response = file_get_contents('http://127.0.0.1:8080');
        $this->assertEquals('Hello', $response);
    }
}