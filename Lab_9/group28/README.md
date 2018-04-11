# Hướng dẫn sử dụng
- Sử dụng XAMPP Tomcat
- Copy thư mục group28 vào thư mục C:/xampp/tomcat/webapps
- Khởi động lại Tomcat của XAMPP
- Truy cập http://localhost:8080/group28
- Mã nguồn java nằm trong thư mục WEB-INF/classes/group28
- Các trang jsp nằm trong thư mục gốc
- Để biên dịch các file mã nguồn java thành các file nhị phân class thì chạy file compiler.bat nằm trong thư mục gốc (Yêu cầu phải chạy được javac)

# Mô hình MVC:
- Model: class group28.CanBo
- View: home.jsp, search.jsp
- Controller: group28.Index, group28.Home, group28.Search
- Các servlet-mapping đóng vai trò như route định hướng yêu cầu của người dùng đến các Controller để xử lý
- Controller sử dụng các Model và request của người dùng để xử lý và chuyển kết quả cho View hiển thị
- Khi truy cập vào thư mục gốc của ứng dụng (http://localhost:8080/group28) thì sẽ được chuyển hướng đến trang /Home
- Trong trang /Home có một form cho phép người dùng nhập vào tên để tìm kiếm, khi nhấn nút submit thì sẽ POST dữ liệ sang trang /Search
- Controller sẽ tìm kiếm tất cả các Model có tên có chứa nội dung người dùng nhập và chuyển kết quả cho View search.jsp
- View search.jsp sẽ hiển thị các kết quả mà Controller xử lý được dưới dạng bảng các kết quả, nếu không tìm được thì bảng rỗng, và có một button để quay trở lại trang /Home
- Nếu truy cập trực tiếp trang /Search thì sẽ chuyển hướng trở lại trang /Home
