<?php

use PHPUnit\Framework\TestCase;


class ShopTest extends TestCase {

     /** 
     * @dataProvider providerDate
     */
    public function testAdd($a,$b,$c) {
        $this->assertEquals($c, $a - $b);
    }
     /** 
     * @dataProvider providerDate
     */
    public function testSub($a,$b,$c) {
        $this->assertArrayNotHasKey($a+$b,[]);
    }
    public function providerDate()
    {
        return array(
            array(8,5,3),
            array(10,2,8)
        );
    }
}