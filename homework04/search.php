<?php



require_once 'connect.php';
 
$connection = mysqli_connect($host, $user, $password, $db);


$full_name = strtr($_GET['full_name'], '*', '%');
$number = strtr($_GET['number'], '*', '%');
echo "<form method='GET' action='search.php'>
<p>Введите полное имя клиента: <input type='text' name='full_name' value='$full_name'></p>
<p>Введите номер клиента: <input type='text' name='number' value='$number'></p>
<p><input type='submit' name='enter' value='Поиск'></p>
</form>";


if (isset($_GET['enter'])) {
    $sql="SELECT full_name, number
    FROM clients
    WHERE full_name LIKE '%$full_name%' AND number LIKE '%$number%'";
    $result = mysqli_query($connection, $sql);
    echo "<table border='1'>
    <tr> 
    <th>full_name</th>
    <th>number</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['full_name'] . "</td>";
        echo "<td>" . $row['number'] . "</td>";
        echo "</tr>";
    }
echo "</table>";
}
mysqli_close($connection);


?>