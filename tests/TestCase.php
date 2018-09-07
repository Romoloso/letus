<?php

namespace Tests;

use App\Models\User;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $mock;

    protected function setUp()
    {
        parent::setUp();

        // 保持登录状态
        $this->login();
    }

    /**
     * 登录
     *
     * @return $this
     */
    protected function login()
    {
        $credential = [
            'email' => '1195775471@qq.com',
            'password' => '123456'
        ];

        $user = new User($credential);

        $this->actingAs($user);
        $this->be($user);

        return $this;
    }

    /**
     * First it creates a new mock.
     *
     * Next I’m binding the mock to the name of the class in Laravel’s IoC container.
     * This means, whenever Laravel is asked for this class,
     * it will return my mocked version instead of the real thing.
     *
     * And finally the method returns the mock
     *
     * @param $class
     * @return \Mockery\MockInterface
     */
    public function mock($class)
    {
        $mock = \Mockery::mock($class);

        $this->app->instance($class ,$mock);

        return $mock;
    }

    /**
     * Between each test, you need to clean up Mockery
     * so that any expectations from the previous test
     * do not interfere with the current test.
     */
    public function tearDown()
    {
        parent::tearDown();
        \Mockery::close();
    }
}
