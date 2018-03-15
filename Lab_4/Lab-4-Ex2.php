<!DOCTYPE html>
<html>

<head>
    <title>Lab 4 Excercise 1</title>
    <style type="text/css">
        table {
            border: 1px solid black;
        }

        td {
            text-align: center;
        }

        #name {
            width: 300px;
        }

        #time {
            width: 200px;
        }

        #size {
            width: 200px;
        }
    </style>
</head>

<body>
    <form method=post action="sort.php">
        <input type="submit" name="sort" value="Sort by name">
        <input type="submit" name="sort" value="Sort by date">
    </form>
    <br>
    <?php
        $directory = 'upload/';
        if (!file_exists($directory)) {
            mkdir($directory);
        }
        $filelist = scandir($directory);// lấy ra danh sách tên file và thư mục
        if (!isset($_POST['submit'])) {
            $list0 = array_diff(scandir($directory), array('..', '.'));// Lấy ra file và thư mục không phải hai thư mục đặc biệt
            echo '<table><tr><td id="name">Name</td><td id="time">Uploaded Time</td><td id="size">Size (bytes)</td></tr>';
            foreach ($list0 as $key => $value) {
                $path = $directory . $value;
                echo "<tr><td>" . $value . "</td><td>" . date("Y-m-d H:i:s", filemtime($path)) . "</td><td>" . filesize($path) . "</td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>

</html>
