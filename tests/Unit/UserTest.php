<?php


namespace Test\Unit;


use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSayHello(){
        $user = new User();
        $this->assertEquals('Hello', $user->sayHello());
    }
}