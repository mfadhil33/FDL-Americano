<?php

namespace FdlAmericano\MhdFadhilAp\test;

use PHPUnit\Framework\TestCase;

Class RegexTest extends TestCase{


    public function testRegex(){

        $path = "/products/123456/categories/abcde";

        $pattern = "#^/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";

        $result = preg_match($pattern, $path, $variables);

        self::assertEquals(1, $result);

    

        array_shift($variables);
        var_dump($variables);
    }
}


