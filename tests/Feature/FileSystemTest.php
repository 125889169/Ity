<?php

namespace Tests\Feature;

use App\Util\FileSystem;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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

    public function testLog()
    {
        $directory = '/';
        $fileSystem = new FileSystem($directory, 'logs');
        dd($fileSystem->files());
    }

    public function testLogInfo()
    {
        $directory = '/';
        $fileSystem = new FileSystem($directory, 'logs');
        try {
            $info = $fileSystem->getDisk()->get('laravel.log');
            dd($info);
        } catch (FileNotFoundException $e) {
            dd($e->getMessage());
        }
    }
}
