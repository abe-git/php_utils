<?php
require_once __DIR__ . "/../../src/functions.php";
// use function php_utils\functions\convertToGreyScale;
use PHPUnit\Framework\TestCase;

class test_functions extends TestCase
{
    public function testTest(){
        // 第一引数が期待値、第二引数が実値
        $expected = true;
        $actual = true;
        $this->assertSame($expected,$actual);
    }
    public function testconvertToGreyScale(){
        $expected = "#aaaaaa";
        $actual = convertToGreyScale("#ffff00");
        $this->assertSame($expected,$actual);
    }
}