<?php
session_start();
function login_error()
{
if(isset($_SESSION['E_login_exist']))
{
echo '<div class="error">'.$_SESSION['E_login_exist'].'</div>';
unset($_SESSION['E_login_exist']);
}
if(isset($_SESSION['E_login_isset']))
{
echo '<div class="error">'.$_SESSION['E_login_isset'].'</div>';
unset($_SESSION['E_login_isset']);
}
}
function password_error()
{
if(isset($_SESSION['E_short_password']))
{
echo '<div class="error">'.$_SESSION['E_short_password'].'</div>';
unset($_SESSION['E_short_password']);
}
if(isset($_SESSION['E_capital_letter']))
{
echo '<div class="error">'.$_SESSION['E_capital_letter'].'</div>';
unset($_SESSION['E_capital_letter']);
}
if(isset($_SESSION['E_without_number']))
{
echo '<div class="error">'.$_SESSION['E_without_number'].'</div>';
unset($_SESSION['E_without_number']);
}
}
?>