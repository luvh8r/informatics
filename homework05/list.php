<?php
require_once 'connect.php';

$connection = mysqli_connect($host, $user, $password, $db);
$hotels_result = mysqli_query($connection, "SELECT * FROM `hotel`");

echo "<table border=1 align=center>
  <tr>
  <td align=center width = 70>ID Отеля</td>
  <td align=center width = 100>ID Директора</td>
  <td align=center width = 130>Количество звезд</td>
  <td align=center width = 80>Edit</td>
  </tr>";
while ($row = mysqli_fetch_array($hotels_result)) {
    $hotel_id = $row['hotel_id'];
    $director_id = $row['director_id'];
    $name = $row['name'];
    echo "<tr>";
    echo "<td>" . $hotel_id . "</td>";
    echo "<td>" . $director_id . "</td>";
    echo "<td>" . $name . "</td>";
    echo "<td align=center width = 80><a href='edit.php?hotel_id=$hotel_id&director_id=$director_id&stars=stars&name=$name&hotel_id=$hotel_id'>edit</a><br></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($link);
?>
