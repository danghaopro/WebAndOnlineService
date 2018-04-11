package group28;

import java.io.*;
import java.util.ArrayList;
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
public class Search extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        resp.sendRedirect(req.getContextPath() + "/Home");
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String name = ((String) req.getParameter("name")).trim().toLowerCase();
        ArrayList<CanBo> canbos = new ArrayList<>();
        for (CanBo canbo : CanBo.getAllObject()) {
            if (canbo.getTen().toLowerCase().contains(name)) {
                canbos.add(canbo);
            }
        }
        req.setAttribute("canbos", canbos);

        RequestDispatcher view = req.getRequestDispatcher("search.jsp");
        view.forward(req, resp);
    }
}
