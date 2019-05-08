<!-- place me in /var/www/html/login.php -->
<html>
<head>
<!--

<?php
foreach($_SERVER as $key=>$value) {
  if(substr($key, 0, 7) == 'MELLON_') {
    echo($key . '=' . $value . "\r\n");
  }
}

if (isset($_SERVER['MELLON_http://schemas_microsoft_com/ws/2008/06/identity/claims/role'])) { echo($_SERVER['MELLON_http://schemas_microsoft_com/ws/2008/06/identity/claims/role']);

        $servername = "10.0.0.1";
        $username = "icingaweb2";
        $password = "xxxxxxxxxxxxx";
        $dbname = "icingaweb2";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO icingaweb_group_membership (group_id, username) VALUES ('1', '".$_SERVER['MELLON_NAME_ID']."')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

}
?>








?>-->
<meta http-equiv="Refresh" content="0; url=/icingaweb2">
</head>
<body>
You are now logged in and should be automatically redirected to: <a href="/icingaweb2/">Icingaweb2</a>
</body>
</html>
