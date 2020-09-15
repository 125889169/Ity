<?php

namespace Tests\Unit;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

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

    public function testRedisData()
    {
        Cache::store('redis')->forget('groupChat');
        $this->assertTrue(true);
    }
}
