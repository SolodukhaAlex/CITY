<?php
//Получаем данные из глобальной переменной $_GET, так как мы передаем данные методом GET
$name = $_POST['name']; // Вытаскиваем имя в переменную
$email = $_POST['email']; // Вытаскиваем почту в переменную
$phone = $_POST['number'];

$name = htmlspecialchars($name);
$email = htmlspecialchars($email);
$phone = htmlspecialchars($phone);

$name = urldecode($name);
$email = urldecode($email);
$phone = urldecode($phone);

$name = trim($name);
$email = trim($email);
$phone = trim($phone);

$message = "Имя: $name, номер телефона: $phone, почта: $email "; // Формируем сообщение, отправляемое на почту
$to = "solodukha.as@gmail.com"; // Задаем получателя письма

$from = $_POST['email']; // От кого пришло письмо
$subject = "Подписка с сайта CITY"; // Задаем тему письма
$headers = "From: $from\r\nReply-To: $to\r\nContent-type: text/html; charset=utf-8\r\n"; // Формируем заголовок письма (при неправильном формировании может ломаться кодировка и т.д.)
if (mail($to, $subject, $message, $headers)) { // При помощи функции mail, отправляем сообщение, проверяя отправилось оно или нет
    echo "<p>Сообщение успешно отправлено</p>"; // Отправка успешна
}
else {
    echo "<p>Что-то пошло не так, как планировалось</p>"; // Письмо не отправилось
}
?>
