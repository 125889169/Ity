<?php

namespace Rules;

use App\Rules\ContinuousCharacter;
use Tests\TestCase;

class ContinuousCharacterTest extends TestCase
{
    public function testPasses()
    {
        $m = new ContinuousCharacter();
        $this->assertTrue($m->passes('a', 'ab//'));
    }
}
