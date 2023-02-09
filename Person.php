<?php
session_start();
class Person
{
public $login;
public $password;
public $password_check;
private static $all_logins,$all_passwords;
function __construct($login="",$password="")
{
$this->login=$login;
$this->password=$password;
$this->password_check="";
}
public function __set($name,$value)
{
$this->$name=$value;	
}
public function get_info_file()
{
if(file_exists("./dane.txt"))
{
$file=file("dane.txt",FILE_IGNORE_NEW_LINES);
for($i=0,$l_i=0,$p_i=0;$i<count($file);$i++)
{
if($i%2==0)
{
self::$all_logins[$l_i]=$file[$i];
$l_i++;
}
else if($i%2==1)
{
self::$all_passwords[$p_i]=$file[$i];
$p_i++;
}
}
}
}
public function login_to():bool
{
if($this->login=="")
{
$_SESSION['E_login_isset']="Proszę podać login";
return false;
}
foreach(self::$all_logins as $key=>$value)
{
if($value==$this->login)
{
if(self::$all_passwords[$key]==$this->password){echo "c";
return true;}
else
{
$_SESSION['E_L_haslo']="błędne hasło";
return false;
}
}
}
$_SESSION['E_L_login']="nie istnieje konto o podanym loginie";
return false;
}
public function create_new_account():bool
{
if($this->login==null)
{
$_SESSION['E_login_isset']="Proszę podać login";
return false;
}
if($this->check_new_account()==false||$this->check_password()==false)
{
return false;
}
$file=fopen("dane.txt","a");
fwrite($file,
"\n".$this->login."\n".$this->password);
fclose($file);
return true;
}
private function check_new_account():bool
{
foreach(self::$all_logins as $i)
{
if($i==$this->login)
{
$_SESSION['E_login_exist']="Konto o podanym loginie już istnieje";
return false;
}
}
return true;
}
private function check_password():bool
{
if($this->password!=$this->password_check)
{
$_SESSION['E_not_the_same_password']="Hasła różnią się od siebie";
return false;
}
if(strlen($this->password)<8)
{
$_SESSION['E_short_password']="Hasło musi posiadać minimum 8 znaków";
}
if($this->password==strtolower($this->password))
{
$_SESSION['E_capital_letter']="Hasło musi posiadać przynajmniej 1 dużą literę";
}
for($i=0;$i<strlen($this->password);$i++)
{
if(is_numeric($this->password[$i])){return true;}
}
$_SESSION['E_without_number']="Hasło musi posiadać przynajmniej 1 liczbę";
if(isset($_SESSION['E_short_password'])||isset($_SESSION['E_capital_letter'])||isset($_SESSION['E_without_number']))
{return false;}
return true;
}
}
$p=new Person();
$p->get_info_file();
?>