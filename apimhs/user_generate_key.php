<?php

    $uname  = $_POST['uname'];
    $pwd    = $_POST['pwd'];

    $token  = md5($uname.$pwd);

    // koneksi database
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "kemahasiswaan";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // cek user
    $sql    = "UPDATE user SET key_token='$token' WHERE username='$uname' AND password='$pwd'";
    $result = $conn->query($sql);

    echo "Key atau Token API Anda: ".$token;

?>

