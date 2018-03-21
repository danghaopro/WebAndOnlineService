<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Lab 6.1: Exercises 6.5</title>
        <style media="screen">
            table {
                width: 50%;
            }
            th {
                background: #F0F0F0;
            }
            input {
                width: 100%;
            }
            span {
                display: block;
                padding-right: 5px;
                padding-left: 1px;
            }
        </style>
    </head>
    <body>
        <h1>Category Administration</h1>
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '123456';
        $dbname = 'business_service';

        $con = mysqli_connect($host, $user, $pass, $dbname);

        // if submit then insert to database
        if (isset($_POST['submit'])) {
            $catid = $_POST['catid'];
            $title = $_POST['title'];
            $des = $_POST['des'];

            if (!$con) {
                print("<h3>Error while connect to mysql!<br>Can't add the new category</h3>");
            } else {
                $strquery = "INSERT INTO categories (categoryid, title, description) ";
                $strquery .= "VALUES ('{$catid}', '{$title}', '{$des}')";
                if (!mysqli_query($con, $strquery)) {
                    print("<h3>ERROR while insert row<br>" . mysqli_error($con) . "</h3>");
                }
            }
        }
        ?>
        <form method="post">
            <table>
                <tr>
                    <th width="25%">CatID</th>
                    <th width="35%">Title</th>
                    <th width="40%">Description</th>
                </tr>
                <!-- Begin MySQL Query -->
                <?php
                if ($con) {
                    $strquery = "SELECT * FROM categories";
                    $resultset = mysqli_query($con, $strquery);
                    if ($resultset && mysqli_num_rows($resultset) > 0) {
                        while ($row = mysqli_fetch_assoc($resultset)) {
                            print("<tr>");
                            print("<td>{$row['categoryid']}</td>");
                            print("<td>{$row['title']}</td>");
                            print("<td>{$row['description']}</td>");
                            print("</tr>");
                        }
                    }
                }
                ?>
                <!-- End MySQL Query -->
                <tr>
                    <td><span><input type="text" name="catid"></span></td>
                    <td><span><input type="text" name="title"></span></td>
                    <td><span><input type="text" name="des"></span></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add Category">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
