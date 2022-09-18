<?php

    session_start();

    if(isset($_POST['submit'])){
        $uname  = $_POST['uname'];
        $pwd    = $_POST['pwd'];
        
        // koneksi database
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "kemahasiswaan";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // cek user
        $sql    = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $_SESSION['uname'] = $uname;
            $_SESSION['pwd'] = $pwd;
        } else {
            echo "login salah";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate API Key / Token</title>
</head>
<body>
    
    selamat datang <?php echo $_SESSION['uname']; ?>
    
    <form action="user_generate_key.php" method="POST">
        <input type="hidden" name="uname" value="<?php echo $_SESSION['uname']; ?>">
        <input type="hidden" name="pwd" value="<?php echo $_SESSION['pwd']; ?>">
        <br>
        <input type="submit" name="submit" value="Generate Key/Token">
    </form>

</body>
</html>