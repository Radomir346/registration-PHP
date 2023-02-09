<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<title>Rejestracja</title>
<link rel="stylesheet" href="style.css"/>
</html>
<?php
require_once './funkcje.php';
require_once './Person.php';
if(isset($_POST['back']))
{
header('Location: logowanie.php');
}
if(isset($_POST['R_login']))
{
$p->login=$_POST['R_login'];
$p->password=$_POST['R_haslo'];
$p->password_check=$_POST['R_powtorz_haslo'];
if($p->create_new_account()==true)
{header('Location: logowanie.php');}
}
?>
<html>
<form method="post" action="rejestracja.php">
<h3>Witaj użytkowniku w naszym sklepie. Proszę się zarejestrować</h3>
Login:<br/>
<input type="text" name="R_login"/><br/>
<?php
login_error();
?>
Hasło:<br/>
<input type="password" name="R_haslo"/><br/>
<?php
password_error();
?>
Powtórz Hasło:<br/>
<input type="password" name="R_powtorz_haslo"/><br/>
<?php
if(isset($_SESSION['E_not_the_same_password']))
{
echo '<div class="error">'.$_SESSION['E_not_the_same_password'].'</div>';
unset($_SESSION['E_not_the_same_password']);
}
?>
<te style="text-align: center"><input type="submit" value="Wyślij" name="R_wyslij"/>
<input type="submit" value="wróć do logowania" name="back"/></te>
</form>
</html>