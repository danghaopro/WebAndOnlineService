<?php
  class Counter {
    private static $count = 0;
    const VERSION = 2.0;
    // self dùng để gọi đến các biến và hàm static trong class
    function __construct() {
      self::$count++;
    }
    function __destruct() {
      self::$count--;
    }
    static function getCount() {
      return self::$count;
    }
  }
  /*
  Hàm getCount() được khai báo là static trong class Counter nên có thể gọi trực tiếp mà không cần tạo đối tượng
  Tuy nhiên vẫn có thể gọi thông qua một đối tượng đã được khởi tạo
  */

  $c1 = new Counter;// Khởi tạo mội đối tượng Counter -> gọi đến __construct nên $count tăng thêm 1 và có giá trị $count = 1
  print($c1->getCount() . "<br>");// in ra giá trị $count = 1

  /*
  __construct tiếp tục được gọi, thực hiện tăng giá trị của $count
  vì $count là biến static nên giá trị vẫn là $count = 1
  sau khi khởi tạo đối tượng này thì $count = 2
  */
  $c2 = new Counter();
  print(Counter::getCount() . "<br>");// in ra giá trị $count = 2

  // Gán giá trị NULL cho biến $c2 -> hàm hủy __destruct của Counter sẽ được thực hiện và giảm giá trị của $count, lúc này $count = 1
  $c2 = NULL;

  print($c1->getCount() . "<br>");// in ra giá trị $count = 1
  print("Version used: " . Counter::VERSION . "<br>");
?>
