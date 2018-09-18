<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $this->assertTrue(true);
    }

    public function testCreateUser()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'password' => bcrypt(123456),
            '_token' => csrf_token()
        ];

        $this->call('POST', route('users.store'), $data)
            ->assertStatus(201);
    }
}
