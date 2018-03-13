<?php  

	class ObjectTracker {
//tạo biến static $nextSerial
		private static $nextSerial = 0;
		private $id, $name;
//hàm khởi tạo của lớp ObjectTracker
		function __construct($name) {
			$this->name = $name;
			$this->id = ++self::$nextSerial;
		}

		function __clone() {
			$this->name = "Clone of $this->name";
			$this->id = ++self::$nextSerial;
		}
		function getId() {
			return $this->id;
		}
		function getName() {
			return $this->name;
		}
		function setName($name) {
			$this->name = $name;
		}
	}

	$o = new ObjectTracker("First object");
	//Tạo một đối tượng của lớp ObjectTracker 
	//với tên là First object
	//cùng với đó, id của o = 1 = $nextSerial + 1
	$o2 = clone $o;
	//sao chép đối tượng $o sang đối tượng $o2 với đầy đủ các thuộc tính của $o
	//gọi đến hàm __clone(), biến id tăng thêm 1
	$o2->setName("Second object");
	//in ra giá trị ID, name của hai đối tượng o và o2
	echo "1: <br>";
	echo $o->getId() . "-" . $o->getName() . "<br>";
	echo "2: <br>";
	echo $o2->getId() . "-" . $o2->getName() . "<br>";
	/*
	output của đoạn mã trên là:
	1:
	1-First object
	2:
	2-Second object
	*/
	/*
	khi sử dụng $o2 = $o thì output là:
	1:
	1-Second object
	2:
	1-Second object
	*/
?>