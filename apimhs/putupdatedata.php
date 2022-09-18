<?php
    //Header hasil berbentuk json
    header("Content-Type:application/json");
    //tangkap metode akses
    $method = $_SERVER ['REQUEST_METHOD'];
    //variable hasil
    $result = array();
    if($method=='PUT'){

        parse_str(file_get_contents("php://input"), $_PUT);

        //pengecekan parameter
        if(isset($_PUT['nim']) AND isset($_PUT['nama']) AND isset($_PUT['alamat'])
         AND isset($_PUT['id_mhs'])){

        //tangkap parameter
        $nim = $_PUT['nim'];
        $nama = $_PUT['nama'];
        $alamat = $_PUT['alamat'];
        $id_mhs = $_PUT['id_mhs'];

         //jika metode sesuai
         $result['status'] = [
            "code" => 200,
            "description" => '1 Data Updated'
        ];
        //Start koneksi database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kemahasiswaan";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        //buat query
        $sql = "UPDATE mahasiswa SET nim='$nim',
                                            nama='$nama',
                                            alamat='$alamat' WHERE 
                                            id_mhs='$id_mhs'";
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