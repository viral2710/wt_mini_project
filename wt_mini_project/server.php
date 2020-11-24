<?php
include ('include/db_connect.php');
$sql = 'SELECT * FROM user WHERE ';
$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<html>

<head>
</head>

<body>
    hello
</body>

</html>