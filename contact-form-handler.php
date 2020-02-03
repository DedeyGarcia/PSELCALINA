<?php 

/*

Esse código é uma variante do código para envio de emails dessa fonte:
https://form.guide/contact-form/php-email-contact-form.html

*/

$errors = '';
$myemail = 'andreylucas.garcia@gmail.com';//<-----Put Your email address here.
$senderemail = 'noreply@cursomusica.com';
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['phone']) || 
   empty($_POST['curso']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$phone = $_POST['phone']; 
$curso = $_POST['curso']; 


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Formulário do Música Online de $name";
	$email_body = "Obrigado por se inscrever no Música Online.\n ".
	"Aqui estão os dados do formulário:\n Nome: $name \n Email: $email_address \n Telefone: $phone \n Curso Escolhido: $curso"; 
	
	$headers = "From: $senderemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>