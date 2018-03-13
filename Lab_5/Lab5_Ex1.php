<?php

//tạo phần đầu trang
function addHeader($page, $title)
{
    //<<<EOD là cú pháp HereDoc hoạt động giống như dấu nháy đôi "", nhưng có thể viết
    //chuỗi nhiều dòng và khoong cần nối chuỗi
    $page .= <<<EOD
		<html>
		<head>
		<title>$title</title>
		</head>
		<body>
		<h1 align="center">$title</h1>
EOD;//kết thúc HereDoc phải ở trái nhất và duy nhất trên dòng
		return $page;
	}
	//tạo phần footer
	function addFooter($page, $year, $copyRight) {
		$page .= <<<EOD
		<div align="center">&copy; $year $copyright</div>
		</body>
		</html>
EOD;//in ra năm và copyright ở giữa, và đóng thẻ body, html
    return $page;
}

	//khởi tạo biến $page
	$page = '';
	//thêm phần header vào trang
	$page = addHeader($page, 'A Prodecural Script');
	//thêm một số thứ vào thân trang
	$page .= <<<EOD  
	<p align="center">This page was generated with a procedural  
	script</p>  
EOD; 
	//thêm phần footer cho trang
	$page = addFooter($page, date('Y'), 'Procedural Designs Inc.');
	//hiển thị trang (chưa có css)
	echo $page;
?>