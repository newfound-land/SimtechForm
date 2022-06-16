<?php
require 'connect.php';

$sql = "SELECT * FROM feedback_result";
if ($result = $connect->query($sql)) {
  $rowsCount = $result->num_rows;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  };
  $num = 10;
  $start = $page * $num - $num;
  $str_pag = ceil($rowsCount / $num);
  $li = '';
  for ($i = 1; $i <= $str_pag; $i++) {

    $li .= '<li class="page-item"><a class="page-link" href=order.php?page=' . $i . ">" . $i . " </a></li>";
  }

  $sql = "SELECT * FROM `feedback_result` LIMIT $start, $num";
  $result = $connect->query($sql);
  $rowPage = $result->num_rows;

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/x-icon" href="favicon.ico" rel="shortcut icon">
    <link type="Image/x-icon" href="favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Таблица заявок </title>
  </head>

  <body>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #a2d0d9;font-size:large;font-weight:bold;">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" href="main.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
              <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z" />
            </svg>
            <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.html">Форма обратной связи</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="order.php">Таблица заявок</a>
        </li>
      </ul>
    </nav>
    <hr class='my-4 container' style='width: 70rem;'>
    <nav class="container" style="width: 70rem;" aria-label="List">
      <div style="display: flex;flex-direction: row;justify-content: end;" >
      <ul class="pagination justify-content-end">
      <p class='h5 align-self-center' style='margin-top:7px;'>Получено <?php echo $rowPage ?> из <?php echo $rowsCount ?> записей</p>&nbsp&nbsp<?php echo $li ?>
       
        </ul>
      </div>
    </nav>
  <?php
    echo "<div class='container'><table class='table table-hover' > 
    <thead class='thead-light'><tr class='table-info'>
   <th>Имя</th>
	<th>Фамилия</th>
	<th>Email</th>
	<th>Телефон</th>
	<th>Вид связи</th>
	<th>Сообщение</th>
	<th>файл</th>
	<th>Рассылка</th>
    <th>Время</th>
	</tr>
  </thead>";
  foreach ($result as $row) {
    $filetype = mime_content_type($row["Files"]);
    $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
    if (in_array($filetype, $allowed_file_types)) {
      $file = '<td><img class="card-img-top" style="object-fit:contain;" weight=80 height=80 src="' . $row["Files"] . '" </td>';
    } elseif ($filetype == 'directory') {
      $file = '<td> Файл не загружен </td>';
    } else {
      $file = '<td><a class="card-img-top" href="' . $row["Files"] . '">Скачать</a> </td>';
    }


    echo "<tbody><tr>";
    echo "<td >" . $row["FirstName"] . "</td>";
    echo "<td >" . $row["LastName"] . "</td>";
    echo "<td >" . $row["Email"] . "</td>";
    echo "<td >" . $row["Phone"] . "</td>";
    echo "<td >" . $row["ComunicationMethod"] . "</td>";
    echo "<td>" . $row["Message"] . "</td>";
    echo $file;
    echo "<td>" . $row["MaillingList"] . "</td>";
    echo "<td>" . date('Y-m-d H:i:s', $row["Time"]) . "</td>";

    echo "</tr></tbody>";
  }
  echo "</table></div>";
  $result->free();
}
  ?>
  <hr class='my-3 container' style='width: 70rem;'>
  <nav class="container" style="width: 70rem;" aria-label="List">
    <ul class="pagination justify-content-end">

      <?php echo $li ?>


    </ul>
  </nav>

  </body>

  </html>