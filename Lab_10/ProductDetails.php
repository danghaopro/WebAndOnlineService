<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Product Details</title>
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
            table {
                margin: auto;
            }
            table.details tr td.right {
                text-align: right; padding: 5px;
            }
            table.details tr td.left {
                text-align: left; padding: 5px;
            }
        </style>
    </head>
    <body align=center>
        <div class="body">
            <div class="header">
                <h3>Lab 10 Group 28</h3>
            </div>
            <?php
            if (!isset($_POST['productID'])) {
                echo "Ban chua chon san pham nao";
                exit();
            }
            $productID = $_POST['productID'];
            require("DatabaseIO.php");
            $con = new DatabaseIO();
            $result = $con->query('SELECT * FROM products WHERE id = ' . $productID);
            if ($result === false || $result->num_rows == 0) {
                echo "ERROR DatabaseIO";
                exit();
            }
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $num = $row['num']; ?>
            <table border="1" width='80%'>
                <tr>
                    <td width='25%'>
                        <img src="img/<?php echo $productID; ?>.png" width=150px height=150px>
                    </td>
                    <td width='75%'>
                        <form action="ViewCart.php" method="post">
                            <table class="details">
                                <tr>
                                    <td width='50%' class='right'><b>Product Name</b></td>
                                    <td width='50%' class='left'><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td width='50%' class='right'><b>Product Description</b></td>
                                    <td width='50%' class='left'><?php echo $description; ?></td>
                                </tr>
                                <tr>
                                    <td width='50%' class='right'><b>Price</b></td>
                                    <td width='50%' class='left'><?php echo $price == 0 ? 'Free!' : $price; ?></td>
                                </tr>
                                <tr>
                                    <td width='50%' class='right'><b>Amount</b></td>
                                    <td width='50%' class='left'>
                                        <?php
                                        if ($num == 1) {
                                            echo "<input type='hidden' name='amount' value='1'>1";
                                        } else {
                                            echo "<input type='number' name='amount' min='1' max='$num' value='1'>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                                        <input type="submit" name="addcart" value="Add To Cart">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="ViewCart.php">Xem gio hang</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
