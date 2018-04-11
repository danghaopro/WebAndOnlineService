<%@ page language="java" contentType="text/html;charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Group 28 - Home</title>
	</head>
	<body>
		<% String rootPath = request.getContextPath(); %>
		<form action="<%=rootPath%>/Search" method="post">
			Nhập tên:
			<input type="text" name="name">
			<input type="submit" name="submit" value="Search">
		</form>
	</body>
</html>
