<?php
    class BaseClass {
        protected $name = "BaseClass";
        function __construct() {
            print("In {$this->name} construct<br>");
        }
        function __destruct() {
            print("Destroying {$this->name} <br>");
        }
    }
    class SubClass extends BaseClass {
        function __construct() {
            /*
                SubClass kế thừa BaseClass nên cũng sở hữu biến $name của class cha
                Hàm khởi tạo của SubClass gán lại giá trị cho biến $name
                Các thao tác với biến $name của các đối tượng SubClass sẽ có giá trị mới này
            */
            $this->name = "SubClass";
            parent::__construct();// Gọi đến hàm khởi tạo của lớp cha
        }
        function __destruct() {
            parent::__destruct();// Gọi đến hàm hủy của lớp cha
        }
    }
    $base = new BaseClass();// Khởi tạo một đối tượng mới
    $sub = new SubClass();// Khởi tạo một đối tượng mới
    /* 
        Sau khi thực hiện xong rồi gửi cho trình duyệt và đóng kết nối, các đối tượng sẽ bị hủy
        Hoặc có thể hủy đối tượng trực tiếp bằng cách gán = NULL
        Khi đối tượng bị hủy thì sẽ gọi đến hàm __destruct của đối tượng đó
    */
?>
