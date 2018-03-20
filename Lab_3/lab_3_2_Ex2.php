<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Lab 3-2: Exercises 2</title>
  </head>
  <body>

    <!-- Begin Form Input -->
    <?php
      if (isset($_POST['submit'])) {
        $name1 = $_POST['name1'];
        $name2 = $_POST['name2'];
        $day1 = $_POST['day1'];
        $month1 = $_POST['month1'];
        $year1 = $_POST['year1'];
        $day2 = $_POST['day2'];
        $month2 = $_POST['month2'];
        $year2 = $_POST['year2'];
      } else {
        $name1 = '';
        $name2 = '';
        $day1 = 1;
        $month1 = 1;
        $year1 = 2000;
        $day2 = 1;
        $month2 = 1;
        $year2 = 2000;
      }
    ?>
    <form method="post">
      <table>
        <tr>
          <td></td>
          <th>Person 1</th>
          <th>Person 2</th>
        </tr>
        <tr>
          <td>Name:</td>
          <td><input type="text" name="name1" value="<?php echo $name1; ?>"></td>
          <td><input type="text" name="name2" value="<?php echo $name2; ?>"></td>
        </tr>
        <tr>
          <td>Birthday:</td>
          <td>
            <select name="day1">
              <?php
                for ($i = 1; $i <= 31; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $day1 ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <select name="month1">
              <?php
                for ($i = 1; $i <= 12; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $month1 ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <input type="text" name="year1" maxlength="4" size="1" value="<?php echo $year1; ?>">
          </td>
          <td>
            <select name="day2">
              <?php
                for ($i = 1; $i <= 31; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $day2 ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <select name="month2">
              <?php
                for ($i = 1; $i <= 12; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $month2 ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <input type="text" name="year2" maxlength="4" size="1" value="<?php echo $year2; ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="Submit">
          </td>
        </tr>
      </table>
    </form>
    <!-- End Form Input -->

    <!-- Begin Processing -->
    <?php
      if (isset($_POST['submit'])) {
        if (!checkdate($month1, $day1, $year1) || "{$year1}-{$month1}-{$day1}" > date("Y-n-j")) {
          echo "Hello {$name1}, your birthday is invalid!";
          exit();
        }
        if (!checkdate($month2, $day2, $year2) || "{$year2}-{$month2}-{$day2}" > date("Y-n-j")) {
          echo "Hello {$name2}, your birthday is invalid!";
          exit();
        }
        $year = date("Y");
        $d1 = date_create("{$year1}-{$month1}-{$day1}");
        $d2 = date_create("{$year2}-{$month2}-{$day2}");
        $date1 = date_format($d1, "l, F d, Y");
        $date2 = date_format($d2, "l, F d, Y");
        $age1 = $year - $year1;
        $age2 = $year - $year2;
        echo "The birthday of {$name1} is {$date1}, {$age1} years old<br>";
        echo "The birthday of {$name2} is {$date2}, {$age2} years old<br>";
        echo "The difference in days of two date is: " . abs(date_diff($d1, $d2)->format("%R%a")) . " days<br>";
        if ($age1 > $age2) {
          echo "{$name1} more than {$name2} " . ($age1 - $age2) . " years old!";
        } else if ($age2 > $age1) {
          echo "{$name2} more than {$name1} " . ($age2 - $age1) . " years old!";
        } else {
          echo "{$name1} and {$name2} are the same age!";
        }
      }
    ?>
    <!-- End Processing -->

  </body>
</html>
