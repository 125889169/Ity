<?php
use PHPUnit\Framework\TestCase;
class SystemTest extends TestCase
{
    public function test()
    {
        $str = "获取系统类型及版本号：" . php_uname() . "\n";
        $str .= "只获取系统类型：" . php_uname('s') . "\n";
        $str .= "只获取系统版本号：" . php_uname('r') . "\n";
        $str .= "获取PHP运行方式：" . php_sapi_name() . "\n";
        $str .= "获取前进程用户名：" . Get_Current_User() . "\n";
        $str .= "获取PHP版本：" .  PHP_VERSION . "\n";
        $str .= "获取Zend版本：" .   Zend_Version() . "\n";
        $str .= "获取PHP安装路径：" .   DEFAULT_INCLUDE_PATH . "\n";
        $str .= "服务器操作系统：" .   PHP_OS . "\n";
        echo ($str);
    }
}
