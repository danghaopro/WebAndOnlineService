<%@ page language="java" contentType="text/html;charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="group28.CanBo" %>
<%@ page import="java.util.ArrayList" %>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Group 28 - Home</title>
	</head>
	<body>
		<%
		String rootPath = request.getContextPath();
		ArrayList<CanBo> canbos = (ArrayList<CanBo>)request.getAttribute("canbos");
		%>

		<table border=1 width=50% style="margin: auto;">
			<tr>
				<th>Tên</th>
				<th>Năm sinh</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
			</tr>
			<% if (canbos.size() == 0) { %>
				<tr>
					<td colspan="4">Không tìm thấy cán bộ nào</td>
				</tr>
			<% } else { %>
				<% for (CanBo canbo : canbos) { %>
					<tr>
						<td><%=canbo.getTen()%></td>
						<td><%=canbo.getNgaysinh()%></td>
						<td><%=canbo.getDiachi()%></td>
						<td><%=canbo.getSodienthoai()%></td>
					</tr>
				<% } %>
			<% } %>
			<tr>
				<td colspan="4" align=center>
					<a href="<%=rootPath%>/Home">
						<button type="button">Quay lại</button>
					</a>
				</td>
			</tr>
		</table>
	</body>
</html>
