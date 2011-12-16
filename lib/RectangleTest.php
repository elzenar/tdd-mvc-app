<?php

require_once 'Rectangle.php';


class RectangleTest extends PHPUnit_Framework_TestCase {

    function testCalculateSquare(){
        $rectangle = new Rectangle(5, 10);
        $square = $rectangle->calculateSquare();

        $this->assertEquals(50, $square);
    }

    function testCalculatePerimetr(){
        $rectangle = new Rectangle(5, 10);
        $perimeter = $rectangle->calculatePerimeter();

        $this->assertEquals(30, $perimeter);
    }

    /**
     * @dataProvider providerDimentions
     *
     */
    function testWrongValues($w, $h, $e){
        $this->setExpectedException('Exception', $e);
        $rectangle = new Rectangle($w, $h);
        $square = $rectangle->calculateSquare();

    }

    /**
     * @dataProvider providerDimentions
     */
    public function providerDimentions()
    {
        return array(
          array(0, 0, 'Values should be more then 0'),
          array(0, 1, 'Values should be more then 0'),
          array(1, 0, 'Values should be more then 0'),
          array(-1, 1, 'Negative values are forbidden'),
          array(1, -1, 'Negative values are forbidden'),
        );
    }
}

?>
