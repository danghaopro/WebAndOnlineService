<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>View Cart</title>
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
        </style>
    </head>
    <body align=center>
        <?php
        $products = isset($_SESSION['products']) ? $_SESSION['products'] : array();
        if (isset($_POST['productID']) && isset($_POST['amount'])) {
            $productID = $_POST['productID'];
            $amount = $_POST['amount'];
            $products[$productID] = $amount;
            if ($amount == 0) {
                unset($products[$productID]);
            }
            $_SESSION['products'] = $products;
        }
        ?>
        <div class="body">
            <div class="header">
                <h3>Lab 10 Group 28</h3>
            </div>
            <form id="formProduct" method="post">
                <table border="1" width='80%'>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    $numProduct = count($products);
                    if ($numProduct == 0) {
                        echo "<tr><td colspan ='4'>Gio hang trong</td></tr>";
                    } else {
                        require("DatabaseIO.php");
                        $con = new DatabaseIO();
                        foreach ($products as $key => $value) {
                            $result = $con->query('SELECT * FROM products WHERE id = ' . $key);
                            if ($result === false || $result->num_rows == 0) {
                                continue;
                            }
                            $row = $result->fetch_assoc();
                            $name = $row['name'];
                            $price = $row['price'];
                            echo "<tr><td><img src='img/$key.png' width=100px height=100px></td>";
                            echo "<td>";
                            echo "$name<br>";
                            echo "<button onclick=\"edit('$key')\">Edit</button>";
                            echo "<button onclick=\"remove('$key')\">Remove</button>";
                            echo "</td>";
                            echo "<td>$value</td>";
                            echo "<td>" . ($price == 0 ? 'Free!' : ($price * $value)) . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    <tr>
                        <td colspan="2" style="text-align: left;">
                            <a href="index.php"><button type="button" name="button">Continue Shopping</button></a>
                        </td>
                        <td colspan="2" style="text-align: right;">
                            <button type="button" name="button">Check Out</button>
                        </td>
                    </tr>
                </table>
                <input id='productID' type="hidden" name="productID">
                <input id='amount' type="hidden" name="amount">
            </form>
        </div>
    </body>
    <script type="text/javascript">
        function remove(id) {
            var form = document.getElementById('formProduct');
            form.action = 'ViewCart.php';
            document.getElementById('productID').value = id;
            document.getElementById('amount').value = 0;
            form.submit();
        }
        function edit(id) {
            var form = document.getElementById('formProduct');
            form.action = 'ProductDetails.php';

            document.getElementById('productID').value = id;
            form.submit();
        }
    </script>
</html>
