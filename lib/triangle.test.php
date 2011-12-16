<?php 

require('triangle.class.php');

class TriangleTestCase extends PHPUnit_Framework_TestCase {
	
	/**
	 * @expectedException Exception
	 * @dataProvider setTextParam
	 */
	function testTextParam($a,$b,$c) {
		$triangle  = new Triangle($a,$b,$c);	
	}
	
	function setTextParam() {
		return array(
			array("jj",4,5),
			array(1,"jj",5),
			array(1,4,"jj")
			);
	}
	
	/**
	 * @expectedException Exception
	 * @dataProvider setZeroParam
	 */
	function testZeroParam($a,$b,$c) {
		$triangle  = new Triangle($a,$b,$c);
	}
	
	function setZeroParam() {
		return array(
			array(0,4,5),
			array(1,0,5),
			array(1,4,0)
			);
	}
	
	/**
	 * @expectedException Exception
	 * @dataProvider setMinusParam
	 */
	function testMinusParam($a,$b,$c) {
		$triangle  = new Triangle($a,$b,$c);
	}
	
	function setMinusParam() {
		return array(
			array(-1,4,5),
			array(1,-1,5),
			array(1,4,-1)
			);
	}
	
	/**
	 * @expectedException Exception
	 * @dataProvider setNoObject
	 */
	function testNoObject($a,$b,$c) {
		$triangle  = new Triangle($a,$b,$c);
	}
	
	function setNoObject() {
		$object = new stdClass();
		return array(
			array($object,4,5),
			array(1,$object,5),
			array(1,4,$object)
			);
	}
	
	/**
	 * @expectedException Exception
	 */
	function testMoreParam() {
		$triangle  = new Triangle(2,4,5,4);
	}
	
	/**
	 * @expectedException Exception
	 */
	function testLessParam() {
		$triangle  = new Triangle(3,4);
	}
	
	function testIsDirect() {
		$triangle  = new Triangle(3,4,5);
		$result = $triangle->getIsDirect();
		$this->assertTrue($result, "Fail! Triangle not direct!!!");	
	}
	
	function testIsNotDirect() {
		$triangle  = new Triangle(3,4,8);
		$result = $triangle->getIsDirect();
		$this->assertFalse($result, "Fail! Triangle not direct but return True!!!");	
	}
	
	function testGetSquare() {
		$triangle  = new Triangle(3,4,5);
		$result = $triangle->getSquare();
		$this->assertEquals(6,$result, "Fail! getSquare bad return!!!");	
	}
	
	function testGetSquareFail() {
		$triangle  = new Triangle(3,4,5);
		$result = $triangle->getSquare();
		$bo = ($result == 6);
		$this->assertFalse($bo, "Fail! getSquareFail bad return!!!");	
	}
	
	function testGetPerimeter() {
		$triangle  = new Triangle(3,4,5);
		$result = $triangle->getPerimeter();
		$this->assertEquals(12,$result, "Fail! getPerimeter bad return!!!");	
	}
	
	function testGetPerimeterFail() {
		$triangle  = new Triangle(3,4,5);
		$result = $triangle->getPerimeter();
		$bo = ($result == 1);
		$this->assertFalse($bo, "Fail! getPerimeterFail bad return!!!");	
	}
}


?>