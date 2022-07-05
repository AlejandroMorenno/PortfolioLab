<?php
/* $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
  
  $name = htmlspecialchars($name);
  $email = htmlspecialchars($email);
  $subject = htmlspecialchars($subject);
  $message = htmlspecialchars($message);  
  
  $name = urldecode($name);
  $email = urldecode($email);
  $subject = urldecode($subject);
  $message = urldecode($message);  
  
  $name = trim($name);
  $email = trim($email);
  $subject = trim($subject);
  $message = trim($message);  
  
  if(mail("khilman.2013@mail.ru",
          "Новое письмо с сайта",
          "Имя: ".$name."\n".
          "Почта: ".$email."\n".
          "Тема: ".$subject."\n".
          "Текст: ".$message, 
          "From: no-reply@mydomain.ru")
   ){
       echo ('Good');
   }
   else{echo('Bad');} */
  
   $to = "khilman.2013@mail.ru";
   $from = trim($_POST['email']);
   $message = htmlspecialchars($_POST['message']);
   $message = urldecode('message');
   $message = trim($message);
   $headers = "From: $from" . "\r\n" .
   "Reply-To^ $from" . "\r\n" .
   "X-Mailer: PHP/" . phpversion();
   if (mail($to,$message,$headers)){
       echo ('Good');
   }
?>