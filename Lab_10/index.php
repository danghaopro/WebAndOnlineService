<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Lab 10</title>
        <style media="screen">
            body {
                max-width: 1000px;
                margin: auto;
                background-color: #e1e1e1;
            }
            div.body {
                background-color: #ccccf1;
            }
            div.select_product {
                background: #1fcccc;
            }
        </style>
    </head>
    <body align=center>
        <div class="body">
            <div class="header">
                <h3>Lab 10 Group 28</h3>
            </div>
            <?php
            require("DatabaseIO.php");
            $con = new DatabaseIO();
            $result = $con->query('SELECT * FROM products');
            if ($result === false) {
                echo "ERROR DatabaseIO";
                exit();
            }
            $num_rows = $result->num_rows;
            if ($num_rows == 0) {
                echo "Hien tai khong co mat hang nao";
                exit();
            } ?>

            <div class="select_product">
                <form action="ProductDetails.php" method="post">
                    <select name="productID">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" name="viewdetail" value="GO">
                </form>
            </div>
        </div>
    </body>
</html>
