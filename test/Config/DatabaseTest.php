<?php 



namespace FdlAmericano\MhdFadhilAp\Config;


use PHPUnit\Framework\TestCase;
use FdlAmericano\MhdFadhilAp\Config;


class DatabaseTest extends TestCase {

    public function testGetConnection(){
    
        $connection =  Database::getConnection();
        self::assertNotNull($connection);
    }

    public function testGetConnectionSingleton(){
       $conn1 = Database::getConnection();
       $conn2 = Database::getConnection();
       self::assertSame($conn1, $conn2);
    }
}