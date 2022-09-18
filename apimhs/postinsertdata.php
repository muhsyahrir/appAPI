<?php
    //Header hasil berbentuk json
    header("Content-Type:application/json");
    //tangkap metode akses
    $method = $_SERVER ['REQUEST_METHOD'];
    //variable hasil
    $result = array();
    if($method=='POST'){

        //pengecekan parameter
        if(isset($_POST['nim']) AND isset($_POST['nama']) AND isset($_POST['alamat'])){
        //tangkap parameter
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
         //jika metode sesuai
         $result['status'] = [
            "code" => 200,
            "description" => '1 Data Inserted'
        ];
        //Start koneksi database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kemahasiswaan";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //buat query
        $sql = "INSERT INTO mahasiswa (nim, nama, alamat)
                                        VALUES('$nim', '$nama', '$alamat')";
        //eksekusi query
        $conn->query($sql);
        //masukkan ke array result
        $result['results'] = [
            "nim" => $nim,
            "nama" => $nama,
            "alamat" => $alamat
        ] ;

        }else{
            $result['status'] = [
                "code" => 400,
                "description" => 'Parameter Invalid'
            ];
        }
       
    }else{
        $result['status'] = [
            "code" => 400,
            "description" => 'Method Not Valid'
        ];
    }
    //tampilkan data format json
    echo json_encode($result);

    
   ?>