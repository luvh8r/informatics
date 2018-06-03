<?php
require_once 'connect.php';
$connection = mysqli_connect($host, $user, $password, $db);
$hotels_result = mysqli_query($connection, "SELECT * FROM `hotel`");
?>

<html>
<body>
<form method='GET' action='update.php'>
<input type='hidden' name='id' value='<?=@$_GET['id']?>'>
<table border='1'>
<tr>
    <th>hotel_id</th>
    <th>director_id</th>
    <th>name</th>
</tr>
<tr>
    <td><input type='text' name='hotel_id' value='<?=@$_GET['hotel_id']?>'></td>
    <td><input type='text' name='director_id' value='<?=@$_GET['director_id']?>'></td>
    <td><input type='text' name='name' value='<?=@$_GET['name']?>'></td>
</select></td>
</tr>
</table>
<p><input type='submit' name='enter' value='submit changes'></p>
</form>
</body>
</html>