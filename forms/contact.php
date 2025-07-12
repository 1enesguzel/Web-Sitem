<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = htmlspecialchars($_POST['name']);
  $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = htmlspecialchars($_POST['subject']);
  $message = htmlspecialchars($_POST['message']);

  $to = "enes@example.com"; // 🔁 Burayı kendi e-posta adresinle değiştir
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

  $fullMessage = "İsim: $name\nEmail: $email\n\nMesaj:\n$message";

  if (mail($to, $subject, $fullMessage, $headers)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
