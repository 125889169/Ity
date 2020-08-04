<?php

namespace Models;

use App\Models\Admin;
use Tests\TestCase;

class AdminTest extends TestCase
{

    public function testGetAccessedRoutes()
    {
        $user = Admin::find(1);
        dd($user->getAccessedRoutes());
    }
}
