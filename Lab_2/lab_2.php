<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>Lab 2</title>
  </head>
  <body>
    <?php
      echo "Hello " . $_POST['name'] . "<br>";
      echo "You studying at " . $_POST['class'] . ", " . $_POST['university'] . "<br>";

      echo "Your Birthday: " . $_POST['day'] . "/" . $_POST['month'] . "/" . $_POST['year'] . "<br>";
      $num = -1;

      if (isset($_POST['cbfilms'])) {
        $num++;
        $hobbies[$num] = $_POST['cbfilms'];
      }
      if (isset($_POST['cbbooks'])) {
        $num++;
        $hobbies[$num] = $_POST['cbbooks'];
      }
      if (isset($_POST['cbsport'])) {
        $num++;
        $hobbies[$num] = $_POST['cbsport'];
      }
      if (isset($_POST['cbgame'])) {
        $num++;
        $hobbies[$num] = $_POST['cbgame'];
      }
      if (isset($_POST['cbother'])) {
        $num++;
        $hobbies[$num] = "Other: " . $_POST['other'];
      }
      if ($num >= 0) {
        echo "You hobby is<br>";
        echo "<ol>";
        foreach ($hobbies as $value) {
          echo "<li>$value</li>";
        }
        echo "</ol>";
      }
    ?>
  </body>
</html>
