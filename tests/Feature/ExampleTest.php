<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->mock = $this->mock(UserRepository::class);
        $user = $this->mock->shouldReceive('find')->with(47)
            ->andReturn(new \Illuminate\Database\Eloquent\Collection);

        $response = $this->call('GET', '/users');
        $response->assertStatus(200);


    }

}
