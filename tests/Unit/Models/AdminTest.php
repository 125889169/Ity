<?php

namespace Models;

use App\Models\Admin;
use Tests\TestCase;

class AdminTest extends TestCase
{

    public function testGetAccessedRoutes()
    {
        $user = Admin::find(2949037);
        dd($user->getAccessedRoutes());
    }
}
