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

        //tangkap foto
        $stringfoto = $_POST['foto']; //foto dalam bentuk string
        $extfoto = $_POST['extfoto'];
        //string foto kita ubah jadi gambar
        $foto = base64_decode($stringfoto);
        //simpan gambar hasil decode
        file_put_contents('foto/'.$nim.'.'.$extfoto, $foto);
        //membuat name foto
        $name_foto = $nim.'.'.$extfoto;

        //pindahkan dr tmp location ke lokasi permanen
        move_uploaded_file($foto_tmp, 'foto/'.$name_foto);

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
        $sql = "INSERT INTO mahasiswa (nim, nama, alamat, foto)
                                        VALUES('$nim', '$nama', '$alamat', '$name_foto')";
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

   