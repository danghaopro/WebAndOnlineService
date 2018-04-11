package group28;

import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author danghao
 */
public class Home extends HttpServlet {

    @Override
    protected void service(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        RequestDispatcher view = req.getRequestDispatcher("home.jsp");
        view.forward(req, resp);
    }
}
