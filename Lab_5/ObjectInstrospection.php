<?php  

	//trả về mảng các method có thể gọi (bao gồm cả phương thức thừa kế)
	function getMethod($object) {
		$methods = get_class_methods(get_class($object));
		/*
			hàm get_class($object) trả về tên lớp của đối tường được truyền vào
			hàm get_class_methods($class_name) trả về tên của các phương thức được xác định bởi tên lớp $class_name
		*/

		if(get_parent_class($object)) {
			$parent_method = get_class_methods(get_parent_class($object));
			$methods = array_diff($methods, $parent_method);
		/*
		Hàm get_parent_class(mixed $object) trả về tên của lớp cha của đối tượng hoặc tên lớp đc truyền vào
		array_diff($methods, $parent_method) trả về mảng các mục có trong $methods nhưng không có trong $parent_method
		*/
		}
		return $methods;
	}
	//trả về một mảng các phương thức được kế thừa
	function getInheritedMethod($object) {
		$methods = get_class_methods(get_class($object));

		if(get_parent_class($object)) {
			$parent_method = get_class_methods(get_parent_class($object));
			$methods = array_intersect($methods, $parent_method);
			//array_intersect($methods, $parent_method) trả về mảng các giá trị vừa có trong $methods vừa có trong $parent_method
		}
		return $methods;
	}
	//trả về một mảng của các lớp cha
	function getLineage($object) {
		if(get_parent_class($object)) {//nếu get_parent_class($object) != NULL
			$parent = get_parent_class($object);
			$parent_object = new $parent;
			$lineage = getLineage($parent_object);
			$lineage[] = get_class($object);
		} else {//ngược lại
			$lineage = array(get_class($object));
		}
		return $lineage;
	}
	//trả về mảng các lớp con
	function getChildClasses($object) {
		$classes = get_declared_classes();
		//hàm get_declare_classes() trả lại một mảng các tên của các lớp khai báo trong kịch bản hiện tại.
		$children = array();
		foreach ($classes as $class) {
			if(substr($class, 0, 2) == '__') {
			//substr($string, $start, $length) dùng để cắt chuỗi từ start với độ dài length
			//nếu tên của $class bắt đầu bằng __ thì bỏ qua
				continue;
			}
			if(get_parent_class($class) == get_class($object)) {
				//nếu lớp cha của $class là tên lớp của $object thì $class chính là lớp con của lớp $object
				$children[] = $class;//thêm $class vào mảng
			}
		}
		return $children;
	}

	//Hiển thị thông tin trên một đối tượng
	function printObjectInformation($object) {
		$class = get_class($object);//lay ten lop cua $object
		echo "<h2>Class</h2>";
		echo "<p>$class</p>";
		echo "<h2>Inheritance</h2>";
		echo "<h3>Parents</h3>";
		$lineage = getLineage($object);
		array_pop($lineage);
		//array_pop($) trả về giá trị cuối của mảng hoặc NULL nếu mảng rỗng
		echo count($lineage) ? ('<p>' . join(' -&gt', $lineage) . '</p>') : '<i>None</i>';
		//nếu $lineage rỗng thì in ra None, ngược lại in ra chuỗi các phần tử của $lineage ngăn cách bởi -&gt
		echo "<h3>Childrens</h3>";
		$childrens = getChildClasses($object);
		echo "<p>" . (count($childrens) ? join(' , ', $childrens) : "<i>None</i>") . "</p>";
		echo "<h2>Methods</h2>";
		$methods = get_class_methods($class);
		$object_methods = getMethod($object);
		if(!count($methods)) {
			echo "<i>None</i>";
		}
		else {
			echo "<p>Inherited method are in <i>italics</i>.</p>";
			foreach ($methods as $method) {
				echo in_array($method, $object_methods) ? "<b>$method</b><br>" : "<i>$method</i><br>";
				//in_array($a, $b) trả về true nếu $a có trong $b, ngược lại trả về false
			}
		}
		echo "<h2>Properties</h2>";
		$properties = get_class_vars($class);
		//hàm get_class_vars($class_name) 
		//Trả về mảng kết hợp các thuộc tính được khai báo có thể nhìn thấy từ phạm vi hiện tại, với giá 
		//trị mặc định của chúng. Các phần tử mảng kết quả dưới dạng varname => value. Trong trường 
		//hợp có lỗi, nó trả về FALSE.
		if(!count($properties)) {
			echo "<i>None</i>";
		}
		else {
			foreach (array_keys($properties) as $e) {
			//ham array_keys($properties) tra ve mang cac keys cua $properties
				echo "<b>$e</b> = " . $object->$e . "<br>";
			}
		}
		echo "<br>";
	}

	class A {
		var $foo = "foo";
		var $bar = 'bar';
		var $baz = 17.0;

		function firstFunction () {}
		function secondFunction() {}
	}
	class B extends A {
		var $quux = false;
		function thirdFunction( ) {}
	}

	class C extends B {

	}
	$a = new A;
	$a->foo = 'sylvie';
	$a->bar = 23;
	$b = new B;
	$b->foo = 'bruno';
	$b->quux = true;
	$c = new C;

	printObjectInformation($a);
	printObjectInformation($b);
	printObjectInformation($c);

?>