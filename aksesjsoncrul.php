<?php
    
    $ch = curl_init();

    // setting option (setop) u/url yang akan dibuka
    curl_setopt($ch, CURLOPT_URL, "http://localhost/appAPI/datamahasiswa.json");

    //setting option (setopt) u/ hasil hit url bisa ada kembali (return)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    //eksekusi curl
    $output = curl_exec($ch);
    
    //close curl
    curl_close($ch);

    //cek perubahan json to array
   // echo "<pre>"; print_r($output); echo "</pre>";

   //cek perubahan json to array
   $data = json_decode($output);
  // echo "<pre>"; print_r($data); echo "</pre>";

   //echo $data[0]->Nama;

  ?>  

<html>
    <head>
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <?php

        foreach($data as $mhs){
            echo '
                <label>Nama Mahasiswa :</label>
                '.$mhs->Nama.'
                <br/>
                <label>Nim:</label>
                '.$mhs->Nim.'
                <br/>
                ';
                echo "<br/>";
                echo "<label>Hobi :</label><br/>";

                foreach ($mhs->hobi as $hobi){
                    echo "- ".$hobi;
                    echo "<br/>";
                }

                echo "<br/>";
        }

        ?>
    </body>
</html>