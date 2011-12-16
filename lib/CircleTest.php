<?php
require_once 'Circle.php';

class CircleTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider rectangleDataProvider
     */
    public function squareValidRadius($radius, $expectedSquare) {
        $circle = new Circle($radius);
        $this->assertEquals($expectedSquare, $circle->square());
    }

    public function rectangleDataProvider() {
        return array(
            array(0, 0),
            array(1, pi() * pow(1, 2)),
            array(10.5, pi() * pow(10.5, 2)),
        );
    }

    /**
     * @test
     */
    public function squareNullRadius() {
        $this->setExpectedException('Exception','Circle radius should not be null');
        $circle = new Circle(null);
        $circle->square();
    }

    /**
     * @test
     */
    public function squareRadiusLessThenZero() {
        $this->setExpectedException('Exception','Circle radius should not be less then 0');
        $circle = new Circle(-1);
        $circle->square();
    }

    /**
     * @test
     * @dataProvider perimeterValidDataProvider
     */
    public function perimeterValid($radius, $expectedPerimeter)
    {
        $circle = new Circle($radius);
        $this->assertEquals($expectedPerimeter, $circle->square());
    }

    public function perimeterValidDataProvider()
    {
        return array(
            array(0, 0),
            array(1, 2 * pi() * 1),
            array(10.5, 2 * pi() * 10.5)
        );
    }

    /**
     * @test
     */
    public function perimeterNullRadius() {
        $this->setExpectedException('Exception','Circle radius should not be null');
        $circle = new Circle(null);
        $circle->perimeter();
    }

    /**
     * @test
     */
    public function perimeterRadiusLessThenZero() {
        $this->setExpectedException('Exception','Circle radius should not be less then 0');
        $circle = new Circle(-1);
        $circle->perimeter();
    }


}