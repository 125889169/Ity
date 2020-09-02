<?php

namespace Rules;

use App\Rules\EmojiChar;
use Tests\TestCase;

class HaveEmojiCharTest extends TestCase
{

    public function testPasses()
    {
        $m = new EmojiChar();
        $this->assertTrue($m->passes('a', '1123a😜'));
    }
}
