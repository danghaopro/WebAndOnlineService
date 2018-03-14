<?php  

	function display_classes() {
		$classes = get_declared_classes();//trả về mảng các lớp được xác định trong kịch bản(script)
		foreach($classes as $class) {
			echo "Showing information about $class <br>";
			echo "$class method: <br>";
			$methods = get_class_methods($class);//$methods bằng mảng các method có trong lớp $class
			if(!count($methods)) //nếu lớp $class không có phương thức nào
				echo "<i>None</i><br>";//thì in ra None viết nghiêng
			else //ngược lại
				foreach($methods as $method)
					echo "<b>$method</b><br>";//in ra danh sách các tên method có trong $class
			echo "------------------------------------------------------------------------";
			echo "$class properties: <br>";
			$properties = get_class_vars($class);//$properties bằng mảng các thuộc tính có trong lớp 
												//$class
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