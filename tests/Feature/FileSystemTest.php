<?php

namespace Tests\Feature;

use App\Util\FileSystem;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileSystemTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testFileSystem()
    {
        $directory = '/miandan/';
        $fileSystem = new FileSystem($directory);
        dd($fileSystem->lists(2, 20, 1));
    }
}
