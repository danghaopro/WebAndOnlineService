<?php  
/* 
	Tạo lớp PropertyTest có các magic methods set, get giống C#
	Hàm __set($name, $value) in ra dòng chữ Setting "tên biến" với "giá trị", 
	trong đó tên biến và giá trị đc truyền vào hàm __set()
	Hàm __get($name) in ra dòng chữ Getting "tên biến" với tên biến được truyền vào __get()
	nếu tồn tại key = $name trong mảng data thì return lại $data[$name], ngược lại in ra custom trigger_error
*/
	class PropertyTest {
		private $data = array();
		public $declare = 1;
		private $hidden = 2;
		public function __set($name, $value) {
			echo "Setting $name to $value <br>";
			$this->data[$name] = $value;
		}

		public function __get($name) {
			echo "Getting $name.<br>";
			if(array_key_exists($name, $this->data)) {
				return $this->data[$name];
			}
			$trace = debug_backtrace();
			trigger_error(
				'Undefined property via = __get(): ' .$name . 
				' in ' . $trace[0]['file'] .
				' on line ' . $trace[0]['line'],
				E_USER_NOTICE
			);
			return NULL;
		}
		//trả về true nếu $name tồn tại, ngược lại return false
		public function __isset($name) {
			echo "Is $name set? <br>";
			return isset($this->data[$name]);
		}
		//hàm hủy $name
		public function __unset($name) {
			echo "Unsetting $name <br>";
			unset($this->data[$name]);
		}
		//return giá trị hidden của đối tượng
		public function getHidden() {
			return $this->hidden;
		}
	}

	echo "<pre>\n";
	$o = new PropertyTest;
	$o->a = 1;//gọi đến __set($name, $value) với $name = a, $value = 1
	echo $o->a . "\n\n";
	var_dump(isset($o->a));
	unset($o->a);//hủy thuộc tính a
	var_dump(isset($o->a));
 
	echo "\n" . $o->declare . "\n\n";
	echo "Let 's experiment with the private property named 'hidden': \n";
	echo "Privates are visible inside class, so __get() not used...\n";
	echo $o->getHidden() . "\n";
	echo "Privates not visible outside of class, so __get() is used...\n";
	echo $o->hidden;
	/*
	khi thuộc tính private access đc gọi bên trong lớp như hàm getHidden(), thì __get() sẽ không đc sử dụng
	ngược lại, hàm __get() được sử dụng
	output:
	Setting a to 1 
	Getting a.
	1

	Is a set? 

	boolean true

	Unsetting a 
	Is a set? 

	boolean false


	1

	Let 's experiment with the private property named 'hidden': 
	Privates are visible inside class, so __get() not used...
	2
	Privates not visible outside of class, so __get() is used...
	Getting hidden.
	*/
?>