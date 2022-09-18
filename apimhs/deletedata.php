<?php
    //Header hasil berbentuk json
    header("Content-Type:application/json");
    //tangkap metode akses
    $method = $_SERVER ['REQUEST_METHOD'];
    //variable hasil
    $result = array();
    if($method=='DELETE'){

        parse_str(file_get_contents("php://input"), $_DELETE);

        //pengecekan parameter
        if(isset($_DELETE['id_mhs'])){

        //tangkap parameter
        $id_mhs = $_DELETE['id_mhs'];

         //jika metode sesuai
         $result['status'] = [
            "code" => 200,
            "description" => '1 Data Deleted'
        ];
        //Start koneksi database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kemahasiswaan";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //buat query
        $sql = "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'";
        //eksekusi query
        $conn->query($sql);

        //masukkan ke array result
        $result['results'] = [
            "id_mhs" => $id_mhs
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
