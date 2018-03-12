<?php
	if (isset($_POST['submit'])) {
		$number = $_POST['number'];
    echo "You have chosen to upload " . $number . " files";
    echo '<form method=POST enctype="multipart/form-data">';	// danghao: Cần phải có enctype="multipart/form-data" để upload file
		echo '<input type="file" name="myFile[]" multiple><br>';
		echo '<input type="hidden" name="number" value="' . $number . '">';// danghao: biến $number sẽ không tòn tại nữa khi upload file
		echo '<input type="submit" name="upload"></form>';
	}
	if (isset($_POST['upload'])) {
    print_r($_POST);        // đoạn này in ra 1 file đầu tiên trong số nhiều file được chọn
    print_r($_FILES);       // đoạn này in ra empty array

    if (isset($_FILES['myFile'])) {
      $myFile = $_FILES['myFile'];
      $fileCount = count($myFile["name"]);
			$number = $_POST['number'];
      if ($fileCount > $number) {
        echo "<p>You have uploaded more files than you submitted</p>";
      } else {
        for ($i = 0; $i < $fileCount; $i++) {                   //http://php.net/manual/en/function.move-uploaded-file.php
					/* danghao: dòng dưới này chỗ [$i] nếu upload 1 file thì sẽ bị lỗi vì biến name không phải array nữa
					   và $_FILES['mtFile'] chứ không phải $_FILES['upload']
						 bến trên đã lấy ra $myFile = $_FILES['myFile'] rồi thì dưới này dùng luôn cái $myFile cũng được */
          $filename = $_FILES['upload']['name'][$i];          		//tên file khi upload lên thư mục (destination)
          $file_tmp = $_FILES['upload']['tmp_name'][$i];      		//tên file
          move_uploaded_file($file_tmp, "upload/" . $filename);  	//chuyển file vào thư mục "upload/" với tên là filename
        }
      }
    }
	}
?>
