<?php
    /*
        hàm implode sẽ nối các phần tử của mảng truyền vào thành một chuỗi ngăn cách bởi tham số truyền vào thứ nhất.
        Class nạp chồng hai magic method là __call và __callStatic
        __call() và __callStatic() sẽ được gọi khi ta gọi đến một phương thức/hàm nào đó không tồn tại trong đối tượng
        __call() dùng trong trường hợp thường, __callStatic() dùng trong trường hợp phương thức tĩnh không tồn tại
        Các tham số truyền vào trong __call() và __callStatic: $name là tên phương thức, $arguments là danh sách các tham số truyền vào $name method.
    */
    class MethodTest {
        public function __call($name, $arguments) {
            //chú ý: giá trị của $name phân biệt hoa thường
            echo "Calling object method '$name' " . implode(', ', $arguments) . "<br>";
        }

        public static function __callStatic($name, $arguments) {
            //chú ý: giá trị của $name phân biệt hoa thường
            echo "Calling static method '$name' " . implode(', ', $arguments) . "<br>";
        }
    }

    //khởi tạo đối tượng obj của lớp MethodTest
    $obj = new MethodTest;
    //thử gọi đến phương thức nhom_28 của MethodTest theo hai cách non-static và static
    $obj->nhom_28('in object context');
    MethodTest::nhom_28('in static context');
    /*
    output:
    Calling object method 'nhom_28' in object context
    Calling static method 'nhom_28' in static context
    */
?>
