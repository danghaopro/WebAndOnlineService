<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Lab 3-2: Exercises 1</title>
  </head>
  <body>
    <!-- Begin Form Input -->
    <?php
      if (isset($_POST['cal'])) {
        $cal = $_POST['cal'];
        $conv = $_POST['conv'];
      } else {
        $cal = '';
        $conv = 'rad2deg';
      }
    ?>
    <form method="post">
      <table>
        <tr>
          <td>Input:</td>
          <td>
            <input type="text" name="cal" value="<?php echo $cal; ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="radio" name="conv" value="rad2deg" <?php if ($conv == 'rad2deg') { echo "checked"; } ?>>Radian to Degree
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="radio" name="conv" value="deg2rad" <?php if ($conv == 'deg2rad') { echo "checked"; } ?>>Degree to Radian
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" value="Convert">
          </td>
        </tr>
      </table>
    </form>
    <!-- End Form Input -->

    <!-- Begin Processing -->
    <?php
      function convert($cal, $conv) {
        if (is_numeric($cal)) {
          if ($conv == 'rad2deg') {
            $res = $cal * 180.0 / M_PI;
            echo "$cal rad = $res deg";
          } else {
            $res = $cal / 180.0;
            echo "$cal deg = $res&Pi; rad";
          }
        } else {
          echo "The input is not a numeric";
        }
      }

      if (isset($_POST['cal'])) {
        $cal = $_POST['cal'];
        $conv = $_POST['conv'];
        convert($cal, $conv);
      }
    ?>
    <!-- End Processing -->
  </body>
</html>
