<?php
use function php_utils\functions\convertToGreyScale;
use PHPUnit\Framework\TestCase;

class test_functions extends TestCase
{
    public function testTest(){
        // 第一引数が期待値、第二引数が実値
        $expected = true;
        $actual = true;
        $this->assertSame($expected,$actual);
    }
    
    public function testConvertToGreyScale(){
        // 255 * 0.29891 = 76.22205   = 4c
        // 255 * 0.58661 = 149.58555  = 95
        // 255 * 0.11447 = 29.18985   = 1d
        $expected = "#ffffff";
        $actual = convertToGreyScale("#ffffff");
        $this->assertSame($expected,$actual);

        $expected = "#ffffff";
        $actual = convertToGreyScale("#fff");
        $this->assertSame($expected,$actual);

        $expected = "#000000";
        $actual = convertToGreyScale("#000000");
        $this->assertSame($expected,$actual);

        $expected = "#000000";
        $actual = convertToGreyScale("#000");
        $this->assertSame($expected,$actual);

        $expected = "#e2e2e2";
        $actual = convertToGreyScale("#ffff00");
        $this->assertSame($expected,$actual);

        $expected = "#e2e2e2";
        $actual = convertToGreyScale("#ff0");
        $this->assertSame($expected,$actual);

        $expected = "#696969";
        $actual = convertToGreyScale("#ff00ff");
        $this->assertSame($expected,$actual);

        $expected = "#696969";
        $actual = convertToGreyScale("#f0f");
        $this->assertSame($expected,$actual);

        $expected = "#b3b3b3";
        $actual = convertToGreyScale("#00ffff");
        $this->assertSame($expected,$actual);

        $expected = "#b3b3b3";
        $actual = convertToGreyScale("#00ffff");
        $this->assertSame($expected,$actual);

    }
}