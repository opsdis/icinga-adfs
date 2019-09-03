<!-- place me in /var/www/html/locallogin/index.php -->
<html>
<head>
<!--

<?php

if (isset($_POST['locallogin'])) {

 if ($_POST['locallogin']=='yes') {
    setcookie('locallogin', 'yes', time()+2*24*60*60,'/');
    setcookie('mellon-cookie','xxx',time()+40000,'/','.'.$_SERVER['SERVER_NAME']);
    setcookie('icingaweb2-cookie','xxx',time()+40000,'/','.'.$_SERVER['SERVER_NAME']);
    setcookie('icingaweb2-session','xxx',time()+40000,'/','.'.$_SERVER['SERVER_NAME']);

}
 if ($_POST['locallogin']=='no') {
    setcookie('locallogin', 'no', time()+2*24*60*60,'/');
    setcookie('icingaweb2-cookie','xx',time()+4000,'/','.'.$_SERVER['SERVER_NAME']);
    setcookie('icingaweb2-session','xxx',time()+40000,'/','.'.$_SERVER['SERVER_NAME']);

}


}
echo(print_r($_COOKIE));

echo (gethostname());


if (isset($_COOKIE['locallogin'])) {
 $value=$_COOKIE['locallogin'];

 if ($value == 'yes') {$friendlyname='Local';}
 if ($value == 'no') {$friendlyname='SSO';}

}



?>-->
</head>
<body>
Login: <a href="/icingaweb2/">Icingaweb2</a>
<br>

<form action="" method="post">
Login Mode:
<select name="locallogin">
  <option value='<?php echo ($value); ?>' selected disabled hidden><?php echo ($friendlyname); ?></option>
  <option value="no">SSO</option>
  <option value="yes">Local</option>
</select>
  <button type="submit" name="label">Save</button>
</form>

<?php if (isset($extralink)) { echo ($extralink); }  ?>
</body>
</html>
