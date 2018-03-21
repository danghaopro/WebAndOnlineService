<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Lab 7: Exercises 2</title>
    </head>
    <body>
        <!-- ereg and ereg_replace was DEPRECATED in PHP 5.3.0, and REMOVED in PHP 7.0.0 -->
        <?php
        /*
        - Chứa các ký tự từ A đến Z, a đến z
        - Các ký tự số
        - Ký tự gạch dưới
        - Ký tự @
        - Các ký tự trước @ có 6-32 ký tự
        - Chuổi ký ký tự sau @ chia thành hai phần của domain mỗi phần có 2-12 ký tự
        */
        $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
        print($re);
        ?>
    </body>
</html>
