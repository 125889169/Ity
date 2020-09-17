<?php

namespace Util;

use App\Models\Admin;
use App\Util\Routes;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function testRoute()
    {
        $route = new Routes(Admin::find(1));
        dd($route->routes());
    }
}
