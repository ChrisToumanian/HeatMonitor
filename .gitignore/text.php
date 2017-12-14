<?php

  require_once "Mail.php";

  $to = '<' . $_GET['to'] . '>';
  $subject = $_GET['subject'];
  $body = $_GET['body'];

  $from = '<cctoumanian@gmail.com>';
  /* $to = '<8189670838@vtext.com>';
  $subject = 'Hi!';
  $body = "Hey,\n\nHow are you?"; */

  $headers = array(
      'From' => $from,
      'To' => $to,
      'Subject' => $subject
  );

  $smtp = Mail::factory('smtp', array(
          'host' => 'ssl://smtp.gmail.com',
          'port' => '465',
          'auth' => true,
          'username' => 'cctoumanian@gmail.com',
          'password' => 'Waunuma64'
      ));

  $mail = $smtp->send($to, $headers, $body);

  if (PEAR::isError($mail)) {
      echo('<p>' . $mail->getMessage() . '</p>');
  } else {
      echo('<p>Message successfully sent!</p>');
  }

?>