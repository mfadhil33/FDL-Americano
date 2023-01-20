<?php 
namespace FdlAmericano\MhdFadhilAp\App;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase{


        public function testRender(){
        
            view::render('Home/index', [
            
              "PHP Login Management"
            ]);

            $this->expectOutputRegex('[PHP Login Managementss]');
            $this->expectOutputRegex('[htmls]');
            $this->expectOutputRegex('[bodys]');
            $this->expectOutputRegex('[Login Management]');
            $this->expectOutputRegex('[Login]');
            $this->expectOutputRegex('[Register]');
        }
}