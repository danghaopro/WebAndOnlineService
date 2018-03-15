<?php
    if (isset($_POST['submit'])) {
        $number = $_POST['number'];        // $number lưu trữ số file người dùng chọn để upload
        echo "You have chosen to upload {$number} files";
        echo '<form method=POST enctype="multipart/form-data">';
        echo '<input type="file" name="myFile[]" multiple><br>';
        echo '<input type="hidden" name="number" value="' . $number . '">';
        echo '<input type="submit" name="upload"></form>';
    }

    if (isset($_FILES['myFile'])) {
        $number = $_POST['number'];
        $myFile = $_FILES['myFile'];
        $fileCount = count($myFile["name"]);
        if ($fileCount > $number) {
            echo "<p>You have uploaded more files than you submitted</p>";
            echo "<p>You will be redirected to home page in 3 seconds</p>";
            echo "<meta http-equiv=\"refresh\" content=\"3;url=Lab-4-Ex1.php\" />";
        } else {
            $directory = 'upload/';
            if (!file_exists($directory)) {
                mkdir($directory);
            }
            /*
                Khi upload 1 file lên thì server sẽ nhận được 5 thông tin của 1 file:
                name: Tên của file upload
                type: Kiểu file (hình ảnh, word, …)
                tmp_name: Đường dẫn đến file đã upload và lưu trên server
                error: Trạng thái của file, 0 => không có lỗi
                size: Kích thước của file bạn upload

                Nếu input để chọn file cho phép upload nhiều file thì mỗi thuộc tính này sẽ là một array, có thể truy xuất bằng chỉ số
            */
            for ($i = 0; $i < $fileCount; $i++) {                   //http://php.net/manual/en/function.move-uploaded-file.php
                $filename = $_FILES['myFile']['name'][$i];          //tên file khi upload lên thư mục (destination)
                $file_tmp = $_FILES['myFile']['tmp_name'][$i];      //tên file
                move_uploaded_file($file_tmp, $directory . $filename);  //chuyển file vào thư mục "upload/" với tên là filename
            }
            echo "<p>Upload succeeded</p>";
            echo "<p>You will be redirected to home page in 3 seconds</p>";
            echo "<meta http-equiv=\"refresh\" content=\"3;url=Lab-4-Ex1.php\" />";
        }
    }
?>
