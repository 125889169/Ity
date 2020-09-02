<?php

namespace Rules\Directory;

use App\Rules\Directory\ParentDirectory;
use Tests\TestCase;

class HaveParentDirectoryTest extends TestCase
{

    public function testPasses()
    {
        $m = new ParentDirectory();
        $this->assertTrue($m->passes('a', '..'));
    }
}
