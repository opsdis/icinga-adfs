<!-- place me in /var/www/html/login.php -->
<html>
<head>
<!--

<?php

$debug = false;

$mapping['http://schemas_microsoft_com/ws/2008/06/identity/claims/role']['match']='admins';
$mapping['http://schemas_microsoft_com/ws/2008/06/identity/claims/role']['sql']="INSERT INTO icingaweb_group_membership (group_id, username) VALUES ('1', '".$_SERVER['MELLON_NAME_ID']."')";

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "icingaweb2";


if ($debug == true) {

    foreach($_SERVER as $key=>$value) {

      if(substr($key, 0, 7) == 'MELLON_') {

        echo($key . '=' . $value . "\r\n");

      }

    }

}

foreach($_SERVER as $key => $value) {

  if(substr($key, 0, 7) == 'MELLON_' && isset($mapping[substr($key,7)])) {

      $mellon_variable = substr($key,7);
      echo($mellon_variable."\n");

      if (isset($mapping[$mellon_variable])) {

        if ($mapping[$mellon_variable]['match']==$value) {

            echo 'matched:'.$mellon_variable."\n ==".$value;
            $sql = $mapping[$mellon_variable]['sql'];
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->query($sql) === TRUE) {

                if ($debug == true) { echo "New record created successfully"; }

            } else {

                  if ($debug == true) { echo "Error: " . $sql . "<br>" . $conn->error; }

         }
      }
     }
  }
}



?>-->
</head>
<body>
You are now logged in and should be automatically redirected to: <a href="/icingaweb2/">Icingaweb2</a>
</body>
</html>