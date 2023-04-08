<?php
use php_utils\Aa;
use PHPUnit\Framework\TestCase;

class AaTEst extends TestCase
{
    public function testTest(){
        // 第一引数が期待値、第二引数が実値
        $expected = true;
        $actual = true;
        $this->assertSame($expected,$actual);
    }

    public function testHoge(){
        $expected = true;
        $actual = Aa::hoge();
        $this->assertSame($expected,$actual);
    }
}