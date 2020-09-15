<?php

namespace Tests\Feature;

use App\Workerman\GateWay;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test()
    {
        $route = app()->routes->getByName('websocket.test');
        if ($route) {
            $uses = $route->getAction('uses');
            list($controller, $method) = explode('@', $uses);
            if (class_exists($controller) && method_exists($call = new $controller, $method))
                dd($call->$method());
        }
    }
}
