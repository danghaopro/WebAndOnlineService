<?php
  class Counter {
    private static $count = 0;
    const VERSION = 2.0;
    function __construct() {
      self::$count++;
    }
  }
?>
