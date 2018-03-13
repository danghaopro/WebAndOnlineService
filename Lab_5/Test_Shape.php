<?php  

	//abstract root class
	abstract class Shape {
		//tra ve dien tich cua mot hinh
		abstract function getArea();
	}

	//abstract children class
	abstract class Polygon extends Shape {
		//tra ve so canh cua mot hinh
		abstract function getNumberOfSides();
	}
	//Lớp Hình tam giác
	class Triangle extends Polygon {
		public $base;
		public $height;
		public function getArea() {
			return (($this->base * $this->height) / 2);
		}
		public function getNumberOfSides() {
			return 3;
		}
	}
	//lớp Hình chữ nhật
	class Rectangle extends Polygon {

		public $height;
		public $width;

		public function getArea() {
			return ($this->width * $this->height);
		}
		public function getNumberOfSides() {
			return 4;
		}
	}
	//Lớp Hình tròn
	class Circle extends Shape{
    	public $r; //ban kinh

   		public function getArea() {
	        return ($this->r * $this->r * pi());
	    }
	}
	//Lớp Màu
	class Color {
		public $name;
	}

	$myCollection = array();

	//tạo một đối tượng hình chữ nhật
	$r = new Rectangle();
	$r->width = 5;
	$r->height = 7;
	$myCollection[] = $r;
	unset($r);

	//tạo một đối tượng hình tam giác
	$t = new Triangle();
	$t->base = 4;
	$t->height = 5;
	$myCollection[] = $t;
	unset($t);

	//Tạo một đối tượng hình tròn
	$c = new Circle;
	$c->r = 3;
	$myCollection[] = $c;
	unset($c);

	//tạo một đối tượng Color
	$color = new Color;
	$color->name = "blue";
	$myCollection[] = $color;
	unset($color);

	// var_dump($myCollection);
	foreach ($myCollection as $s) {
		if($s instanceof Shape) {//nếu $s là thể hiện của Shape 
			echo "Area: " .$s->getArea() . "<br>\n";
		}
		if($s instanceof Polygon) {//nếu $s là thể hiện của Polygon
			echo "Sides: " .$s->getNumberOfSides() . "<br>\n";
		}
		if($s instanceof Color) {//nếu $s là thể hiện của Color
			echo "Color: " . $s->name . "<br>\n";
		}
		echo "<br>\n";
	}
	/*
	output var_dump($myCollection): 
		array (size=4)
			  0 => 
			    object(Rectangle)[1]
			      public 'height' => int 7
			      public 'width' => int 5
			  1 => 
			    object(Triangle)[2]
			      public 'base' => int 4
			      public 'height' => int 5
			  2 => 
			    object(Circle)[3]
			      public 'r' => int 3
			  3 => 
			    object(Color)[4]
			      public 'name' => string 'blue' (length=4)

	output chương trình:
		Area: 35
		Sides: 4

		Area: 10
		Sides: 3

		Area: 28.274333882308

		Color: blue

	*/

?>