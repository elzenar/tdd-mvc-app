    <?php
class RectangleException extends Exception {}
/**
 * Created by JetBrains PhpStorm.
 * User: Макс
 * Date: 16.12.11
 * Time: 11:48
 * To change this template use File | Settings | File Templates.
 */
class Rectangle
{
protected $width;

protected $height;

public function getCalcSquare()
{
        return $this->getWidth() * $this->getHeight();

    }

public function getCalcPerimeter()
{

        return ($this->getWidth() + $this->getHeight()) * 2;
    }

public function setWidth($width)
{
        if ($width <= 0) {
            throw new RectangleException('Invalid param');
        }
        $this->width = $width;
    }

public function setHeight($height)
{
        if ($height <= 0) {
            throw new RectangleException('Invalid param');
        }
        $this->height = $height;
    }

public function getHeight()
{
        return $this->height;
    }

public function getWidth()
{
        return $this->width;
    }
}

