<?php

require_once('../app/Circle.php');

class TestCircle extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function setUp()
    {
        $this->object = new Circle();
        $this->object->setRadius(10);
    }


    public function testCalcSquare()
    {
        //Arrange
        //Act
        $result = $this->object->calcSquare();
        //Assert
        $this->assertEquals(314, $result);

    }

    public function testCalcPerimeter()
    {
        //Arrange
        //Act
        $result = $this->object->calcPerimeter();
        //Assert
        $this->assertTrue((string) 62.8 == (string) $result);
    }

    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Invalid radius
     * @dataProvider invalidRadiusData
     */
    public function testInvalidRadius($radius)
    {
        //Act
        $this->object->setRadius($radius);
    }

    public function invalidRadiusData()
    {
        return array(
            array(0),
            array(-1)
        );
    }


}
