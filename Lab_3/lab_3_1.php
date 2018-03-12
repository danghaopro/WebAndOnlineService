<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Lab 3-1</title>
  </head>
  <body>
    <!-- Begin Form Input -->
    <?php
      if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $hour = $_POST['hour'];
        $minute = $_POST['minute'];
        $second = $_POST['second'];
      } else {
        $name = '';
        $day = 1;
        $month = 1;
        $year = 2000;
        $hour = 0;
        $minute = 0;
        $second = 0;
      }
    ?>
    <form method="post">
      <table>
        <tr>
          <td>Name:</td>
          <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
          <td>Date:</td>
          <td>
            <select name="day">
              <?php
                for ($i = 1; $i <= 31; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $day ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <select name="month">
              <?php
                for ($i = 1; $i <= 12; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $month ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <input type="text" name="year" value="<?php echo $year; ?>" maxlength="4" size="1">
          </td>
        </tr>
        <tr>
          <td>Time:</td>
          <td>
            <select name="hour">
              <?php
                for ($i = 0; $i <= 23; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $hour ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <select name="minute">
              <?php
                for ($i = 0; $i <= 59; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $minute ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
            <select name="second">
              <?php
                for ($i = 0; $i <= 59; $i++) {
                  echo '<option value="' . $i . '"' . ($i == $second ? ' selected' : '') . '>' . $i . '</option>';
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit">
          </td>
          <td>
            <input type="reset">
          </td>
        </tr>
      </table>
    </form>
    <!-- End Form Input -->

    <!-- Begin Processing -->
    <?php
      if (isset($_POST['name'])) {
        echo "Hello $name<br>";
        echo "Your datetime selected is $hour:$minute:$second, $day/$month/$year<br>";
        if (!checkdate($month, $day, $year)) {
          echo "The date is invalid!";
          exit();
        }
        if ($hour > 12) {
          $hour -= 12;
          $ampm = "AM";
        } else if ($hour == 12) {
          $ampm = "PM";
        } else if ($hour == 0) {
          $hour = 12;
          $ampm = "AM";
        } else {
          $ampm = "AM";
        }
        if ($hour == 0 || $hour)
        echo "In 12 hours, the time and date is $hour:$minute:$second $ampm, $day/$month/$year<br>";
        switch ($month) {
          case 1:
          case 3:
          case 5:
          case 7:
          case 8:
          case 10:
          case 12:
            $days = 31;
            break;
          case 4:
          case 6:
          case 9:
          case 11:
            $days = 30;
            break;
          default:
            $days = 28;
            break;
        }
        if ($month == 2) {
          if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
            $days++;
          }
        }
        echo "This month has $days days!";
      }
    ?>
    <!-- End Processing -->
  </body>
</html>
