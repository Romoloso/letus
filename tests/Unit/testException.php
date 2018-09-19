<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testException extends TestCase
{
    public function testOne()
    {
        $this->expectException(\InvalidArgumentException::class);
    }

    /**
     * @expectedException \ErrorException
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}
