<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<title>Logowanie</title>
<link rel="stylesheet" href="style.css"/>
</html>
<?php
require_once './Person.php';
require_once './funkcje.php';
if(isset($_POST['new_account']))
{
header('Location: rejestracja.php');
}
else if(isset($_POST['Login']))
{
$p->login=$_POST['Login'];
$p->password=$_POST['Haslo'];
if($p->login_to())
{
header('Location: zalogowano.php');}
}
?>
<html>
<form method="post" action="logowanie.php">
<h3>Witaj użytkowniku w naszym sklepie. Proszę się zalogować</h3>
Login:<br/>
<input type="text" name="Login"/><br/>
<?php
login_error();
?>
Hasło:<br/>
<input type="password" name="Haslo"/><br/>
<?php
password_error();
?>
<te style="text-align: center"><input type="submit" value="Wyślij" name="wyslij"/>
<input type="submit" value="stwórz nowe konto" name="new_account"/></te>
</form>
</html>