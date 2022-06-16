<?php
require_once 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$FirstName = trim($_POST['firstName']);
$LastName = trim($_POST['lastName']);
$Email = trim($_POST['email']);
$Phone =  $_POST['tel'];
$ComunicationMethod = $_POST['method'];
$Message = $_POST['message'];
$Files =  'files/'.$_POST['file'];
$MaillingList =  $_POST['info'];
$Time= time();


    $mail = new PHPMailer;

    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.yandex.ru';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $mail_login;                    
    $mail->Password   = $mail_password;                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                   
    $mail->CharSet= 'utf-8';
    
    $mail->setFrom($mail_login);
    $mail->addAddress($mail_recipient);     
       

    
    $mail->isHTML(true);                                  
    $mail->Subject = 'Заявка на консультацию';
    $mail->Body    = 
    date('Y-m-d H:i:s',$Time).
    '<table>
     <tr><td> Имя:</td><td>'. $FirstName .'</td></tr>
     <tr><td> Фамилия:</td><td> '. $LastName.'</td></tr>
     <tr><td> Email: </td><td>'. $Email .'</td></tr>
     <tr><td> Номер телефона:</td><td> '. $Phone .'</td></tr>
     <tr><td> Метод связи:</td><td> '. $ComunicationMethod.'</td></tr>
     <tr><td> Рассылка: </td><td>'. $MaillingList.'</td></tr>
     </table>';
     if($_POST['file']){
    $mail->addAttachment($Files, 'Файл');  
     }
    $mail->AltBody = 'Полные данные по заявке.';

     $mail->send();
 
    
mysqli_select_db($connect, $database);
$query = mysqli_query(
    $connect,
    "INSERT INTO feedback_result (
           FirstName, 
           LastName, 
           Email, 
           Phone, 
           ComunicationMethod, 
           `Message`, 
           Files, 
           MaillingList,
           `Time`
                  ) 
       VALUES (
           '$FirstName', 
           '$LastName',  
           '$Email', 
           '$Phone', 
           '$ComunicationMethod', 
           '$Message', 
           '$Files', 
           '$MaillingList',
           '$Time'
                     )"
);

if ($query == 'true') {
    echo ' <script type="text/javascript">alert("Данные успешно сохранены!");
         location="main.html";
                   </script>';
 
    } else {
    echo "Произошла ошибка, пожалуйста повторите попытку.";
}
