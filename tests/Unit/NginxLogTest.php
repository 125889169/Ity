<?php

namespace Tests\Unit;

use App\Util\NginxLog;
use App\Util\UserAgent;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class NginxLogTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNginxLog()
    {
        $l = new NginxLog('nginx.log');
        dd($l->get());
    }

    public function testTime()
    {
        $str = '28/Sep/2020:22:21:08 +0800';
        dd(Carbon::create($str)->format('Y-m-d H:i:s'));
    }

    public function testUserAgent()
    {
        $userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36';
        $ua = new UserAgent($userAgent);
        dump($ua->platform());
        dump($ua->browser());
        dump($ua->version());
        dump($ua->robot());
        dump($ua->mobile());
        die;
    }
}
