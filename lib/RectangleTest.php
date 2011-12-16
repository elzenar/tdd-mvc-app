<?php

require_once 'Rectangle.php';


class RectangleTest extends PHPUnit_Framework_TestCase {

    const NEGATIVE_VALUE_EXCEPTION = 'NegativeValueException';
    const NULL_VALUE_EXCEPTION = 'NullValueException';

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
    function testWrongValues($w, $h, $e_type, $e_massage){
        $this->setExpectedException($e_type, $e_massage);
        $rectangle = new Rectangle($w, $h);
    }

    /**
     * @dataProvider providerDimentions
     */
    public function providerDimentions()
    {
        return array(
          array(0, 0, self::NULL_VALUE_EXCEPTION, 'Values should be more then 0'),
          array(0, 1, self::NULL_VALUE_EXCEPTION, 'Values should be more then 0'),
          array(1, 0, self::NEGATIVE_VALUE_EXCEPTION, 'Values should be more then 0'),
          array(-1, 1, self::NEGATIVE_VALUE_EXCEPTION, 'Negative values are forbidden'),
          array(1, -1, self::NEGATIVE_VALUE_EXCEPTION, 'Negative values are forbidden'),
          array(null, null, self::NULL_VALUE_EXCEPTION, 'Values should not be empty'),
          array(10, null, self::NULL_VALUE_EXCEPTION, 'Values should not be empty'),
          array(null, 20, self::NULL_VALUE_EXCEPTION, 'Values should not be empty'),
        );
    }
}

?>
