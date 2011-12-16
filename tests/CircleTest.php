<?php

require_once('../app/Circle.php');

class TestCircle extends PHPUnit_Framework_TestCase
{
    protected $object;

    public function setUp()
    {
        $this->object = new Circle();
        $this->object->radius = 10;
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
        $result = $this->object->calcSquare();
        //Assert
        $this->assertEquals(62.8, $result);
    }

    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Invalid radius
     * @dataProvider invalidRadiusData
     */
    public function testInvalidRadius($radius)
    {
        //Arrange
        $this->object->radius = $radius;
        //Act
        $this->object->calcSquare();
        //Assert
    }

    public function invalidRadiusData()
    {
        return array(
            array(0),
            array(-1)
        );
    }


}
