<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab06-Q1</title>
</head>

<body>
<form action="" method="post">
      customerID: <input type="text" name="cusID"><br>
      citizenID: <input type="text" name="citID"><br>
      firstname: <input type="text" name="fnID"><br>
      lastname: <input type="text" name="lnID"><br>
  <input name="submit" type="submit">
</form>

  <?php
  if (isset($_POST['submit'])) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webtech";

  $cusID = $_POST['cusID'];
  $citID = $_POST['citID'];
  $fnID = $_POST['fnID'];
  $lnID = $_POST['lnID'];

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO customers (customerID, citizenID, firstname, lastname)
      VALUES ('$cusID', '$citID', '$fnID','$lnID')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "New record created successfully";
      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $conn = null;
  }
  ?>
</body>
</html>