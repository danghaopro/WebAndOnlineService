package group28;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author danghao
 */
public class CanBo {

    private String ten;
    private String ngaysinh;
    private String diachi;
    private String sodienthoai;

    public CanBo(String ten, String ngaysinh, String diachi, String sodienthoai) {
        this.ten = ten;
        this.ngaysinh = ngaysinh;
        this.diachi = diachi;
        this.sodienthoai = sodienthoai;
    }

    public String getTen() {
        return ten;
    }

    public void setTen(String ten) {
        this.ten = ten;
    }

    public String getNgaysinh() {
        return ngaysinh;
    }

    public void setNgaysinh(String ngaysinh) {
        this.ngaysinh = ngaysinh;
    }

    public String getDiachi() {
        return diachi;
    }

    public void setDiachi(String diachi) {
        this.diachi = diachi;
    }

    public String getSodienthoai() {
        return sodienthoai;
    }

    public void setSodienthoai(String sodienthoai) {
        this.sodienthoai = sodienthoai;
    }

    public static CanBo[] getAllObject() {
        return new CanBo[]{
            new CanBo("Pham Duy Anh", "10-04-1996", "Hai Phong", "01238100497"),
            new CanBo("Nguyen Dang Hao", "06-05-1997", "Hung Yen", "01629397014"),
            new CanBo("Dao Duc Minh", "07-03-1997", "Ha Noi", "01639715025"),};
    }
}
