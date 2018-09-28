<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testFinalAndPrivateAndStatic extends TestCase
{

    public function testPrivate()
    {
        $stub = $this->createMock(PaymentController::class);
        $map = [
            ['a', 'b', 'c'],
            ['d', 'e', 'f']
        ];

        $stub->expects($this->any())
            ->method('doSomething')
            ->will($this->returnValueMap($map));
        $this->assertEquals('c', $stub->doSomething($map[0]));
        $this->assertEquals('f', $stub->doSomething($map[1]));
    }

    public function testStatic()
    {
        $stub = $this->getMockBuilder(PaymentController::class)
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->getMock();
        $stub->expects($this->any())
            ->method('doSomething')
            ->willReturn('foo');
        $this->assertEquals('foo', $stub->doSomething());
    }
}
