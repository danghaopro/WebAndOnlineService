<?php
if (isset($_POST['submit'])) {
	$number = $_POST['number'];
    echo "You have chosen to upload ".$number." files";
    echo "<form method=post>";
	echo "<input type=\"file\" name=\"myFile[]\" multiple><br>";
	echo "<input type=\"submit\" name=\"upload\" value=\"Upload\"></form>";
}
if (isset($_POST['upload'])) {
    print_r($_POST);        // đoạn này in ra 1 file đầu tiên trong số nhiều file được chọn
    print_r($_FILES);       // đoạn này in ra empty array

    if (isset($_FILES['myFile']))
    {
        $myFile = $_FILES['myFile'];
        $fileCount = count($myFile["name"]);
        print_r($_POST);
        if($fileCount>$number)
        {
            echo "<p>You have uploaded more files than you submitted</p>";
        }
        else
        {
            for ($i = 0; $i < $fileCount; $i++) {                   //http://php.net/manual/en/function.move-uploaded-file.php
                $filename = $_FILES['upload']['name'][$i];          //tên file khi upload lên thư mục (destination)
                $file_tmp = $_FILES['upload']['tmp_name'][$i];      //tên file
                move_uploaded_file($file_tmp,"upload/".$filename);  //chuyển file vào thư mục "upload/" với tên là filename
            }
        }
    }
}
?>