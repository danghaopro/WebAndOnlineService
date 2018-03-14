<?php
if (isset($_POST['submit']))
{
	$number = $_POST['number'];        // $number lưu trữ số file người dùng chọn để upload
    echo "You have chosen to upload ".$number." files";
    echo '<form method=POST enctype="multipart/form-data">';
    echo '<input type="file" name="myFile[]" multiple><br>';
    echo '<input type="hidden" name="number" value="' . $number . '">';
    echo '<input type="submit" name="upload"></form>';
}
?>
<?php
if (isset($_FILES['myFile']))
{
    $number = $_POST['number'];
    $myFile = $_FILES['myFile'];
    $fileCount = count($myFile["name"]);
    if($fileCount > $number)
    {
        echo "<p>You have uploaded more files than you submitted</p>";
        echo "<p>You will be redirected to home page in 3 seconds</p>";
        echo "<meta http-equiv=\"refresh\" content=\"3;url=Lab-4-Ex1.php\" />";
    }
    else
    {
				$directory = 'upload/';
				if (!file_exists($directory)) {
    				mkdir($directory, 0755, true);
				}
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
