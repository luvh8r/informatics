<!doctype html>
<head>
    <meta charset="utf-8">
    <title>SETUP</title>
</head>
<body>

  <?php
// Подключение к базе данных
require_once 'connect.php';
$connection = mysqli_connect($host, $user, $password, $db);
  if($connection == false)
  {
    echo "(((((((";
    echo mysqli_connect_error();
    exit();
  }
$query = "CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `number_of_persons` varchar(2) NOT NULL,
  `driver` varchar(20) NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `bus` (`bus_id`, `brand`, `number_of_persons`, `driver`) VALUES
(1, 'volvo', '23', 'Pavel Durov'),
(2, 'BMW', '40', 'Barak Obama'),
(3, 'Lexus', '50', 'Sencov Vorobcov'),
(4, 'BMW', '99', 'Ivan Rudskoy'),
(5, 'Mitsubishi', '33', 'Denzel Curry')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `bus_conditions` (
  `hotel_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `price` varchar(20) NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `bus_conditions` (`hotel_id`, `bus_id`, `price`) VALUES
(1, 2, '$30'),
(1, 4, '$50'),
(2, 4, '$25'),
(3, 1, '$12'),
(4, 3, '$36'),
(5, 2, '$21'),
(5, 5, '$7')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `clients` (
  `clint_id` int(10) NOT NULL,
  `full_name` text NOT NULL,
  `number` tinytext
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `clients` (`clint_id`, `full_name`, `number`) VALUES
(1, 'Ivan Urgant', '89213334455'),
(2, 'Sasha Rijid', '89215862900'),
(3, 'Artem Cooper', '8921332214'),
(4, 'Alex Voronov', '8921334561'),
(5, 'Marat Kharr', '89211121129')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `contract` (
  `hotel_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `conditions` varchar(100) NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `contract` (`hotel_id`, `staff_id`, `conditions`) VALUES
(5, 1, '2 years of work'),
(4, 2, '2 weeks of work'),
(1, 3, '1 month of work'),
(2, 4, '3 month of work')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `directors` (
  `director_id` int(2) NOT NULL,
  `number` int(12) NOT NULL,
  `fullname` text NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `directors` (`director_id`, `number`, `fullname`) VALUES
(1, 11112, 'German Zhukov'),
(2, 22122, 'Albert Kukin'),
(3, 12331123, 'Vasua Vasin'),
(4, 12356723, 'Winston Cherchel'),
(5, 89787, 'Tomas Eddyson')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `extra_services` (
  `hotel_id` int(11) NOT NULL,
  `name_of_service` varchar(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `lenght` varchar(100) NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `extra_services` (`hotel_id`, `name_of_service`, `price`, `lenght`) VALUES
(1, 'museum', '$20', '3 hours'),
(2, 'zoo', '$30', '24 hours'),
(3, 'museum', '$10', '10 hours'),
(4, 'aquapark', '$50', '24 hours'),
(5, 'zoo', '$15', '8 hours')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `hotel` (
  `hotel_id` int(10) NOT NULL,
  `director_id` int(10) NOT NULL,
  `stars` int(5) NOT NULL,
  `name` text NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `hotel` (`hotel_id`, `director_id`, `stars`, `name`) VALUES
(1, 1, 5, 'BRIDGE'),
(2, 2, 4, 'FANCY'),
(3, 2, 5, 'LONDON'),
(4, 1, 5, 'WALTER'),
(5, 2, 4, 'MENTION')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `experience` varchar(50) NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `staff` (`staff_id`, `full_name`, `experience`) VALUES
(1, 'Alex Antonov', '3 years'),
(2, 'Qwery Fillipov', '2 month'),
(3, 'Avgustin Franclin', '23 month'),
(4, 'Atos Aramis', '5 weeks')";
$result = mysqli_query($connection, $query);
$query = "CREATE TABLE `voucher` (
  `client_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `conditions` text NOT NULL
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `voucher` (`client_id`, `hotel_id`, `conditions`) VALUES
(1, 5, 'text'),
(2, 5, 'text'),
(3, 1, 'text'),
(4, 2, 'text'),
(5, 5, 'text')";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `bus_conditions`
  ADD PRIMARY KEY (`hotel_id`,`bus_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `clients`
  ADD PRIMARY KEY (`clint_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `contract`
  ADD PRIMARY KEY (`staff_id`,`hotel_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `extra_services`
  ADD PRIMARY KEY (`hotel_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `director_id` (`director_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `voucher`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `hotel_id` (`hotel_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `extra_services`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`director_id`) REFERENCES `directors` (`director_id`)";
$result = mysqli_query($connection, $query);
$query = "ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`clint_id`),
  ADD CONSTRAINT `voucher_ibfk_2` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`)";
$result = mysqli_query($connection, $query);


//Таблица Отелей
  $hotels_result = mysqli_query($connection, "SELECT * FROM `hotel`");
  echo "<br><h2 align=center>ОТЕЛИ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 70>ID Отеля</td>
  <td align=center width = 100>ID Директора</td>
  <td align=center width = 130>Количество звезд</td>
  <td align=center width = 80>Название</td>
  </tr>";
  while ($hotels = mysqli_fetch_assoc($hotels_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 70 >$hotels[hotel_id]</td>
  <td align=center width = 100>$hotels[director_id]</td>
  <td align=center width = 130>$hotels[stars]</td>
  <td align=center width = 80>$hotels[name]</td>
  
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
//Таблица Автобусовов
$bus_result = mysqli_query($connection, "SELECT * FROM `bus`");
  echo "<br><h2 align=center>АВТОБУСЫ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>Номер автобуса</td>
  <td align=center width = 80>Марка</td>
  <td align=center width = 130>Количество мест</td>
  <td align=center width = 120>Водитель</td>
  </tr>";
  while ($bus = mysqli_fetch_assoc($bus_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$bus[bus_id]</td>
  <td align=center width = 80>$bus[brand]</td>
  <td align=center width = 130>$bus[number_of_persons]</td>
  <td align=center width = 120>$bus[driver]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
// Таблица Цен на автобусы
$bus_price = mysqli_query($connection, "SELECT * FROM `bus_conditions`");
  echo "<h2 align=center>ЦЕНА НА АВТОБУСЫ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 70>Отель</td>
  <td align=center width = 70>Номер автобуса</td>
  <td align=center width = 80>Цена</td>
  </tr>";
  while ($value = mysqli_fetch_assoc($bus_price))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 70 >$value[hotel_id]</td>
  <td align=center width = 70>$value[bus_id]</td>
  <td align=center width = 80>$value[price]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
  //Таблица Клиентов
$clients_result = mysqli_query($connection, "SELECT * FROM `clients`");
  echo "<br><h2 align=center>КЛИЕНТЫ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 90>ID Клиента</td>
  <td align=center width = 100>Полное имя</td>
  <td align=center width = 110>Номер</td>
  </tr>";
  while ($clients = mysqli_fetch_assoc($clients_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 90>$clients[clint_id]</td>
  <td align=center width = 100>$clients[full_name]</td>
  <td align=center width = 110>$clients[number]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
//Таблица Контрактов
$contracts_result = mysqli_query($connection, "SELECT * FROM `contract`");
  echo "<br><h2 align=center>КОНТРАКТЫ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>ID Отеля</td>
  <td align=center width = 80>ID Персонала</td>
  <td align=center width = 130>Условия</td>
  </tr>";
  while ($contracts = mysqli_fetch_assoc($contracts_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$contracts[hotel_id]</td>
  <td align=center width = 80>$contracts[staff_id]</td>
  <td align=center width = 130>$contracts[conditions]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
  //Таблица Директоров
  $directors_result = mysqli_query($connection, "SELECT * FROM `directors`");
  echo "<br><h2 align=center>ДИРЕКТОРА</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 110>ID Директора</td>
  <td align=center width = 100>Номер</td>
  <td align=center width = 130>Полное имя</td>
  </tr>";
  while ($directors = mysqli_fetch_assoc($directors_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 110>$directors[director_id]</td>
  <td align=center width = 100>$directors[number]</td>
  <td align=center width = 130>$directors[fullname]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
  //Таблица Дополнительных Услуг
  $extra_services_result = mysqli_query($connection, "SELECT * FROM `extra_services`");
  echo "<br><h2 align=center>ДОПОЛНИТЕЛЬНЫЕ УСЛУГИ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>ID Отеля</td>
  <td align=center width = 100>Название услуги</td>
  <td align=center width = 100>Цена</td>
  <td align=center width = 150>Продолжительность</td>
  </tr>";
  while ($extra = mysqli_fetch_assoc($extra_services_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$extra[hotel_id]</td>
  <td align=center width = 100>$extra[name_of_service]</td>
  <td align=center width = 100>$extra[price]</td>
  <td align=center width = 150>$extra[lenght]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
  //Таблица Персонал
  $staff_result = mysqli_query($connection, "SELECT * FROM `staff`");
  echo "<br><h2 align=center>ПЕРСОНАЛ</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>ID Персонала</td>
  <td align=center width = 130>Полное имя</td>
  <td align=center width = 100>Опыт работы</td>
  </tr>";
  while ($staff = mysqli_fetch_assoc($staff_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$staff[staff_id]</td>
  <td align=center width = 130>$staff[full_name]</td>
  <td align=center width = 100>$staff[experience]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
 //Таблица Ваучера
  $voucher_result = mysqli_query($connection, "SELECT * FROM `voucher`");
  echo "<br><h2 align=center>ВАУЧЕР</h2>";
  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>ID Клиента</td>
  <td align=center width = 130>ID Клиента</td>
  <td align=center width = 100>Условия</td>
  </tr>";
  while ($voucher = mysqli_fetch_assoc($voucher_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$voucher[client_id]</td>
  <td align=center width = 130>$voucher[hotel_id]</td>
  <td align=center width = 100>$voucher[conditions]</td>
  </tr> 
  </table>"; 
  }
  echo "</table><br><br><br>";
?>



</body>
</html>