<?php
	function display_classes() {
		$classes = get_declared_classes();// danh sách tên các lớp được định nghĩa [string]
		foreach($classes as $class) {
			echo "Showing information about $class <br>";
			echo "$class method: <br>";
			$methods = get_class_methods($class);// danh sách tên các method có trong lớp $class [string]
			if (!count($methods)) //nếu lớp $class không có phương thức nào
				echo "<i>None</i><br>";//thì in ra None viết nghiêng
			else //ngược lại
				foreach($methods as $method)
					echo "<b>$method</b><br>";//in ra danh sách các tên method có trong $class
			echo "------------------------------------------------------------------------";
			echo "$class properties: <br>";
			$properties = get_class_vars($class);// danh sách tên các thuộc tính có trong lớp $class {"name": "value"}
			if(!count($properties)) //nếu lớp $class không có thuộc tính nào
				echo "<i>None</i><br>";//thì in ra None viết nghiêng
			else //ngược lại
				foreach($properties as $p)
					echo "<b>$p</b><br>";
		}
		echo "Ending of display_classes().";
	}
	
	display_classes();
?>
