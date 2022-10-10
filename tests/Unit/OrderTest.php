<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactsController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        $result = (new OrderController())->export();
        $this->assertTrue(true);
        $this->assertNotEmpty($result);
    }
}
