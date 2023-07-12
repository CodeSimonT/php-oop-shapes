<?php

abstract class Shape {
    protected $name;
    abstract public function description();
}

interface IShape {
    public function getArea($length, $width = null);
    public function getPerimeter($length, $width = null);
}
// square
class Square extends Shape implements IShape {
    public function description() {
        return "Square has four equal sides.";
    }

    public function getArea($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "invalid";
        }
        return $length * $length;
    }

    public function getPerimeter($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "invalid";
        }
        return 4 * $length;
    }
}
// rectangle
class Rectangle extends Shape implements IShape {
    public function description() {
        return "Rectangle has two equal sides.";
    }

    public function getArea($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "invalid";
        }
        return $length * $width;
    }

    public function getPerimeter($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "invalid";
        }
        return 2 * ($length + $width);
    }
}
// triangle
class Triangle extends Shape implements IShape {
    public function description() {
        return "Triangle has three sides.";
    }

    public function getArea($length, $width = null) {
        return ($length * $width) / 2;
    }

    public function getPerimeter($length, $width = null) {
        if ($width === null) {
            return "invalid";
        }
        return $length + $width + func_get_arg(2);
    }
}
// circle
class Circle extends Shape implements IShape {
    public function description() {
        return "Circle has no sides, only a curve.";
    }

    public function getArea($radius, $width = null) {
        if ($width !== null) {
            return "invalid";
        }
        return round(pi() * $radius * $radius, 2);
    }

    public function getPerimeter($radius, $width = null) {
        if ($width !== null) {
            return "invalid";
        }
        return round(2 * pi() * $radius, 3);
    }
}
echo "<br>";
$shape1 = new Square();
echo $shape1->description() ; // Output: "Square has four equal sides."
echo $shape1->getArea(4, 4) ; // Output: 16
echo $shape1->getArea(4, 3) ; // Output: "invalid"
echo $shape1->getPerimeter(4, 4) ; // Output: 16
echo $shape1->getPerimeter(4, 3) ; // Output: "invalid"
echo "<br>";
$shape2 = new Rectangle();
echo $shape2->description() ; // Output: "Rectangle has two equal sides."
echo $shape2->getArea(4, 6) ; // Output: 24
echo $shape2->getPerimeter(4, 6) ; // Output: 20
echo "<br>";
$shape3 = new Triangle();
echo $shape3->description() ; // Output: "Triangle has three sides."
echo $shape3->getArea(4, 6) ; // Output: 12
echo $shape3->getPerimeter(4, 6, 7) ; // Output: 17
echo "<br>";
$shape4 = new Circle();
echo $shape4->description() ; // Output: "Circle has no sides, only a curve."
echo $shape4->getArea(5) ; // Output: 78.54 (rounded to two decimal places)
echo $shape4->getPerimeter(5) ; // Output: 31.416 (rounded to three decimal places)

?>
