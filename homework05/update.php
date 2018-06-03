

<?php
require_once ('connect.php');

$hotel_id = $_GET['hotel_id'];
$director_id = $_GET['director_id'];
$name = $_GET['name'];

$connection = mysqli_connect($host, $user, $password, $db);

$sql = "UPDATE hotel
        SET director_id = '" . $director_id . "', name = '" . $name. "'
        WHERE hotel_id=" . $hotel_id . ";";
$result = mysqli_query($connection, $sql);
echo("<script>location.href='list.php'</script>");
?>