<?php

namespace Tests\Unit;

use Laravel\Passport\ClientRepository;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestApiUser extends TestCase
{


    /**
     * Test create a new user with API
     */
    public function testApiCreateUser()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'password' => '123456',
            'password_confirmation' => '123456'
        ];

        request()->headers->add([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $validator = validator($data, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        $this->assertTrue($validator->passes());

        $user = new User($data);
        // $this->assertTrue($user->save());

        $response = $this->json('POST', '/api/auth/register', $data);
        //$response->assertSessionHas('name');
        $response->assertStatus(201);
    }

    /**
     * 测试 api passport 登录
     */
    public function testApiUserLogin()
    {
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Person Access Token', config('app.url')
        );

        \DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'password' => bcrypt('123456')
        ];

        request()->headers->add([
            'Content-Type' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
        ]);

        $user = factory(User::class)->create($data);

        $this->json('POST', 'api/auth/login', [
            'email' => $user->email,
            'password' => '123456',
            'remember_me' => true
        ])->assertStatus(200);

    }
}
