<?php
    //Header hasil berbentuk json
    header("Content-Type:application/json");
    //tangkap metode akses
    $method = $_SERVER ['REQUEST_METHOD'];
    //variable hasil
    $result = array();
    if($method=='GET'){
        //jika metode sesuai
        $result['status'] = [
            "code" => 200,
            "description" => 'Request Valid'
        ];
        //Start koneksi database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kemahasiswaan";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //buat query
        $sql = "SELECT * FROM mahasiswa";
        //eksekusi query
        $hasil_query = $conn->query($sql);
        //masukkan ke array result
        $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
    }else{
        $result['status'] = [
            "code" => 400,
            "description" => 'Request Not Valid'
        ];
    }
    //tampilkan data format json
    echo json_encode($result);

    
   ?>